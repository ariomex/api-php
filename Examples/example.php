<?php
    require "class.ariomex.php";
    $api_key    = 'YOUR API KEY';
    $secret_key = 'YOUR SECRET KEY';
    $ariomex    = new Ariomex( $api_key , $secret_key );

    //Get 15min candles   ///   get_ohlc ( symbol )
    $ohlc = $ariomex -> get_ohlc ( 'btcirt' );
    echo $ohlc;


    //Get Orderbook   ///   get_orderook( symbol )
    $balance = $ariomex -> get_orderbook ( 'btcirt' );
    echo $balance;
    
    
    //Get Balance
    $balance = $ariomex -> get_balance ();
    echo $balance;



    //Get Last Prices
    $last_prices = $ariomex -> get_last_price ();
    echo $last_prices;



    //Get Last Trades   ///   get_last_trades ( symbol );
    $last_trades = $ariomex -> get_last_trades ( 'btcirt' );
    echo $last_trades;



    //Get Pair Info
    $pair_info = $ariomex -> get_pair_info ();
    echo $pair_info;



    //Set Limit Buy   ///   set_limit_buy ( symbol , price , volume )
    $limit_buy = $ariomex -> set_limit_buy ( 'btcirt' , 500000000 , 0.001 );
    echo $limit_buy;



    //Set Limit Sell   ///   set_limit_sell ( symbol , price , volume )
    $limit_sell = $ariomex -> set_limit_sell ( 'btcirt' , 800000000 , 0.001 );
    echo $limit_sell;



    //Set Market Buy   ///   set_market_buy ( symbol , total );
    $market_buy = $ariomex -> set_market_buy ( 'btcirt' , 30000 );
    echo $market_buy;



    //Set Market Sell   ///   set_market_sell ( symbol , volume )
    $market_sell = $ariomex -> set_market_sell ( 'btcirt' , 0.0001 );
    echo $market_sell;




    //Set SLTP   ///   set_sltp ( symbol , volume , SL price , TP price )
    $sltp = $ariomex -> set_sltp ( 'btcirt' , 0.0001 , 600000000 , 820000000 );
    echo $sltp;




    //Set SL   ///   set_sl ( symbol , volume , SL price )
    $sl = $ariomex -> set_sl ( 'btcirt' , 0.0001 , 600000000 );
    echo $sl;



    //Cancel Order   ///   cancel_order ( order id );
    $cancel_order = $ariomex -> cancel_order ( 'api-8ef7-6339-5d27-8bee-7b105f7e85ce' );
    echo $cancel_order;



    //Get Order Info   ///   get_order_info ( symbol , order id );
    $order_info = $ariomex -> get_order_info ( 'btcirt' , 'api-a9bb-22f3-55c8-973b-62171ae25a3c' );
    echo $order_info;
?>
