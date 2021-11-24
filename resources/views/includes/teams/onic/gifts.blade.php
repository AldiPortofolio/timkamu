<style type="text/css">
	.gifts {
		display: flex;
		flex-wrap: wrap;
		border-top: 1px solid rgba(255,255,255,0.1);
		border-right: 1px solid rgba(255,255,255,0.1);
	}
	.gifts .item {
		flex: 1;
		height: 50px;
		display: flex;
		align-items: center;
		justify-content: center;
		border-right: 1px solid rgba(255,255,255,0.1);
		cursor: pointer;
		position: relative;
	}
	.gifts .item:last-child {
		border-right: 0px;
	}
	.gifts .item.head {
		flex: 0 0 100%;
		font-family: 'Nunito Sans';
		font-weight: 800;
		font-size: 12px;
		line-height: 50px;
		background: #2196f3;
		border-right: 0px;
		cursor: default;
	}
	.gifts .item.head .icon {
		width: 16px;
	    position: relative;
	    top: 0px;
	    margin-left: 10px;
	    opacity: 0.7;
	}
	.gifts .item.head:hover {
		background: #2196f3;
	}
	.gifts .item:hover {
		background: rgba(0,0,0,0.4);
	}
	.gifts .item > img {
		width: 30px;
		opacity: 0.6;
	}
	.gifts .item:hover > img {
		opacity: 1;
		transform: scale(1.2);
	}
	.tmx {
		position: absolute;
		bottom: 50px;
		left: 0;
		min-width: 200px;
		display: none;
		background: rgba(0,0,0,0.8);
		color: rgba(255,255,255,0.8);
	}
	.gifts .item:hover > .tmx {
		display: block;
	}
	.tmx {
		font-family: 'Nunito Sans';
		font-weight: 800;
		font-size: 12px;
	}
	.tmx .gx {
		line-height: 50px;
		border-bottom: 1px solid rgba(255,255,255,0.1);
		padding: 0 20px;
	}
	.tmx .gx.gift-action {
		background: rgba(255,0,87,1);
		color: rgba(255,255,255,1);
	}
	.gift-price .curr-icon {
		width: 16px;
		position: relative;
		top: -2px;
		margin-right: 5px;
	}
</style>

<div class="gifts">
	<div class="item head">
		Support ONIC Esports by giving them these items <i data-feather="info" class="icon" data-toggle="tooltip" data-placement="top" title="When you give items to your favorite team, their [Total Incoming Support] value will increase and your name will be recorded in the supporter table."></i>
	</div>
	@foreach ($items as $item)
        <div class="item">
			<img src="{{ asset($item->childs->logo) }}">
			<div class="tmx">
				<div class="gx gift-name">{{ $item->childs->name }}</div>
				<div class="gx gift-price"><img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon">{{ number_format($item->value, 0, '.', ',') }}</div>
				<div class="gx gift-action btn-donate-item" data-item="{{ $item->child_id }}">Berikan ke ONIC Esports</div>
			</div>
		</div>
    @endforeach
</div>