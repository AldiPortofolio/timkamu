<div class="tmw-pane merchandise">
	<div class="body">
		@for ($i = 0; $i < 12; $i++)
            <div class="item" data-target="">
				<a href="#">
					<img src="https://ecs7.tokopedia.net/img/cache/700/product-1/2020/7/8/41875740/41875740_1f861ac2-118e-479c-8916-2778505123a7_1080_1080.webp" class="thumb">
					<div class="price">300 <img src="{{ asset('img/currencies/lp.svg') }}" class="curr-icon"></div>
					<div class="merch-name">JERSEY ONIC REGULAR ISSUE - S</div>
				</a>
			</div>
        @endfor
	</div>
</div>

<style type="text/css">
	.merchandise .body {
		display: flex;
		flex-wrap: wrap;
	}
	.merchandise .body .item {
		flex: 0 0 25%;
		background: #fff;
		border-right: 1px solid rgba(0,0,0,0.1);
		border-bottom: 1px solid rgba(0,0,0,0.1);
		padding: 30px;
		font-size: 12px;
		color: #333;
		line-height: initial;
		opacity: 0.8;
	}
	.merchandise .body .item:hover {
		opacity: 1;
	}
	.merchandise .body .item .thumb {
		width: 100%;
		transition: all 0.1s ease-in;
		margin-bottom: 10px;
	}
	.merchandise .body .item:hover .thumb {
		transform: scale(1.05);
	}
	.merchandise .body .merch-name {
		color: #333;
	}
	.merchandise .price {
		font-family: 'Nunito Sans';
		font-weight: 800;
		font-size: 12px;
	}
	.merchandise .price .curr-icon {
		width: 14px;
		position: relative;
		top: -2px;
	}
</style>