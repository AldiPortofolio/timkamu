<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Http\Models\ItemConversion;
use App\Http\Models\Shop;

class GetPurchaseDetailAction extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        ini_set('memory_limit', '-1');
        
        $purchaseName = app('request')->input('name');
        $whereType = 'game';
        if($purchaseName === 'pulsa') {
            $whereType = 'pulsa';
        } else if ($purchaseName === 'rumah-tangga') {
            $whereType = 'rumah-tangga';
        }
        $purchaseType = app('request')->input('type');

        if($purchaseType !== '' && $purchaseType !== null) {
            if($whereType === 'game') {
                $arrGame = ['mlbb', 'freefire', 'pubgm', 'valorant', 'ragnarok'];
                $isAllowed = in_array($purchaseType, $arrGame);
                if ($isAllowed) {
                    $purchaseName = $purchaseName . '-detail';
                } else {
                    return redirect('purchase/detail?name=diamond');
                }
            } else if ($whereType === 'pulsa') {
                $arrGame = ['telkomsel', 'xl', 'tri', 'google-play'];
                $isAllowed = in_array($purchaseType, $arrGame);
                if ($isAllowed) {
                    $purchaseName = $purchaseName . '-detail';
                } else {
                    return redirect('purchase/detail?name=pulsa');
                }
            } else if ($whereType === 'rumah-tangga') {
                $arrGame = ['token'];
                $isAllowed = in_array($purchaseType, $arrGame);
                if ($isAllowed) {
                    $purchaseName = $purchaseName . '-detail';
                } else {
                    return redirect('purchase/detail?name=rumah-tangga');
                }
            }
        }
        // dd($purchaseName);

        $lpArr = [];
        if($purchaseName === 'lp') {
            $lpArr = [
                1,
                7,
                14,
                28,
                56,
                112,
                224,
                448,
                896,
                1050,
                1400,
                1995,
                2450,
                3500,
                4900,
            ];
        }

        $shops = Shop::where('type', $whereType)->get();

        $items = ItemConversion::get()->where('childs.type', $purchaseType)->pluck('child_id')->toArray();
        $arrMlbbId = array_unique($items);
        $arrMlbb = [];
        $active = 0;
        foreach ($arrMlbbId as $key => $value) {
            $item = ItemConversion::where('child_id', $value)->get();

            $val = [];
            $val['name'] = $value;
            $val['name'] = $item[0]->childs->name;
            foreach($item as $itm) {
                $val['id_'.strtolower($itm->parents->name)] = $itm->id;
                $val[strtolower($itm->parents->name)] = $itm->value;
            }
            $val['active'] = $item[0]->childs->active;
            if ($val['active'] === '0') {
                continue;
            }

            if($val['active'] === '1') {
                $active++;
            }

            array_push($arrMlbb, $val);
        }

        if($whereType === 'game') {
            $arrTempA = [];
            $arrTempB = [];
            foreach ($arrMlbb as $itm) {
                if (strpos($itm['name'], ' Diamond') || strpos($itm['name'], ' UC') || strpos($itm['name'], ' Points')) {
                    array_push($arrTempA, $itm);
                } else {
                    array_push($arrTempB, $itm);
                }
            }

            $arrTempA = collect($arrTempA)->sortBy('lp')->toArray();
            $arrMlbb = array_merge($arrTempA, $arrTempB);
        }

        //cek device yang digunakan user
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $userAgent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($userAgent, 0, 4))) {
            $userAgent = "mobile";
        } else {
            $userAgent = "web";
        }

        $arrView = [
            'type'  => $purchaseName,
            'lpArr' => $lpArr,
            'items' => $arrMlbb,
            'shops' => $shops,
            'user_agent' => $userAgent
        ];

        return view('pages.purchases.'.$purchaseName, $arrView);
    }
}
