<?php
    class Ariomex {
        public $api_key;
        public $api_secret;
        public $random_string;
        public $signature;
        public $time;
        function __construct ( $key , $secret ) {
            $this -> api_key    = $key;
            $this -> api_secret = $secret;
        }
        function signer () {
            $this -> time          = round ( microtime ( true ) * 1000 );
            $this -> random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
            $this -> signature     = $auth_hash = hash_hmac ( 'sha256' , $this -> random_string , $this -> api_secret );
        }
        function get_ohlc ( $symbol ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/get_ohlc';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
            );
            return $this -> curl ( $params , $url );
        }
        function get_balance () {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/get_balance';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
            );
            return $this -> curl ( $params , $url );
        }
        function get_last_price () {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/get_last_price';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
            );
            return $this -> curl ( $params , $url );
        }
        function get_pair_info () {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/get_pair_info';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
            );
            return $this -> curl ( $params , $url );
        }
        function get_last_trades ( $symbol ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/get_last_trades';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
            );
            return $this -> curl ( $params , $url );
        }
        function set_limit_buy ( $symbol , $price , $volume ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/set_limit_buy';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'volume'    => $volume ,
                'price'     => $price ,
            );
            return $this -> curl ( $params , $url );
        }
        function set_limit_sell ( $symbol , $price , $volume ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/set_limit_sell';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'volume'    => $volume ,
                'price'     => $price ,
            );
            return $this -> curl ( $params , $url );
        }
        function set_market_buy ( $symbol , $volume ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/set_market_buy';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'volume'    => $volume ,
            );
            return $this -> curl ( $params , $url );
        }
        function set_market_sell ( $symbol , $volume ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/set_market_sell';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'volume'    => $volume ,
            );
            return $this -> curl ( $params , $url );
        }
        function set_sltp ( $symbol , $volume , $sl_price , $tp_price ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/set_sltp';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'volume'    => $volume ,
                'sl_price'  => $sl_price ,
                'tp_price'  => $tp_price ,
            );
            return $this -> curl ( $params , $url );
        }
        function set_sl ( $symbol , $volume , $sl_price ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/set_sl';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'volume'    => $volume ,
                'sl_price'  => $sl_price ,
            );
            return $this -> curl ( $params , $url );
        }
        function cancel_order ( $order_id ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/cancel_order';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'order_id'  => $order_id ,
            );
            return $this -> curl ( $params , $url );
        }
        function get_order_info ( $symbol , $order_id ) {
            $this -> signer ();
            $url    = 'https://ariomex.com/api/v1/get_order_info';
            $params = array (
                'api_key'   => $this -> api_key ,
                'signature' => $this -> signature ,
                'nonce'     => $this -> random_string ,
                'time'      => $this -> time ,
                'symbol'    => $symbol ,
                'order_id'  => $order_id ,
            );
            return $this -> curl ( $params , $url );
        }
        function curl ( $params , $url ) {
            $query = http_build_query ( $params );
            $ch    = curl_init ();
            curl_setopt ( $ch , CURLOPT_URL , $url );
            curl_setopt ( $ch , CURLOPT_POST , 1 );
            curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
            curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
            $result = curl_exec ( $ch );
            curl_close ( $ch );
            return $result;
        }
    }
?>

