**Ariomex API Documentation**
---


**Public API**
---

**Get Pairs Information**
---


Method: GET


**Example:**


```
$url           = 'https://ariomex.com/api/v1/get_pair_info';
```


Result:


```
{
 "status": true,
 "message": [
   {
     "symbol": "atomirt",
     "max_market_order_ask": 15000,
     "max_market_order_bid": 2000000000,
     "min_order_size": 30000,
     "min_trade_amount": 0.001,
     "volume_precision": 0.001,
     "price_precision": 1,
     "trade_status": "on",
     "base_currency": "atom",
     "quote_currency": "irt"
   },
   {
     "symbol": "bchirt",
     "max_market_order_ask": 300,
     "max_market_order_bid": 2000000000,
     "min_order_size": 30000,
     "min_trade_amount": 1.0e-5,
     "volume_precision": 1.0e-5,
     "price_precision": 1,
     "trade_status": "on",
     "base_currency": "bch",
     "quote_currency": "irt"
   }
 ]
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Get Last Prices**
---

Method: GET

**Example:**


```
$url           = 'https://ariomex.com/api/v1/get_last_price';
```


Result:

```
{
 "status": true,
 "message": [
   {
     "symbol": "atomirt",
     "price": 182393
   },
   {
     "symbol": "bchirt",
     "price": 10267755
   },
   {
     "symbol": "bnbirt",
     "price": 982200
   },
   {
     "symbol": "btcirt",
     "price": 765986458
   }
 ]
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Get Candles**
---
Method: GET


**Example:**


```
$url           = 'https://ariomex.com/api/v1/get_ohlc/btcirt';
```


Result:


```
{
 "status": true,
 "message": [
   {
     "t": "1611667800",
     "o": "759792142.00000000",
     "c": "763005904.00000000",
     "h": "770025431.00000000",
     "l": "759792142.00000000",
     "v": "0.30692890710767"
   },
   {
     "t": "1611666900",
     "o": "770403679.00000000",
     "c": "759848564.00000000",
     "h": "771209244.00000000",
     "l": "759848564.00000000",
     "v": "0.19603496223572"
   },
   {
     "t": "1611666000",
     "o": "758257426.00000000",
     "c": "768234094.00000000",
     "h": "769565551.00000000",
     "l": "758257426.00000000",
     "v": "0.0083073649963421"
   },
   {
     "t": "1611665100",
     "o": "767757984.00000000",
     "c": "757511194.00000000",
     "h": "767757984.00000000",
     "l": "757297980.00000000",
     "v": "0.0011722936815841"
   }
 ]
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Get Last Trades**
---

Method: GET


**Example:**


```
$url           = 'https://ariomex.com/api/v1/get_last_trades/btcirt';
```


Result:


```
{
 "status": true,
 "message": [
   {
     "time": "1611670249",
     "price": "765760501.00000000"
   },
   {
     "time": "1611670248",
     "price": "762915189.00000000"
   },
   {
     "time": "1611670218",
     "price": "764406527.00000000"
   }
 ]
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Get Orderbook**
---

Method: GET


**Example:**


```
$url           = 'https://ariomex.com/api/v1/get_orderbook/btcirt';
```


Result:


```
{
 "status": true,
 "message": {
   "market": "btcirt",
   "bids": [
     {
       "volume": "0.04830975",
       "price": "769049463.000000000"
     },
     {
       "volume": "0.06241439",
       "price": "765446924.000000000"
     },
     {
       "volume": "0.05908171",
       "price": "758576482.000000000"
     }
   ],
   "asks": [
     {
       "volume": "0.02182396",
       "price": "772433839.000000000"
     },
     {
       "volume": "0.07246729",
       "price": "778408250.000000000"
     },
     {
       "volume": "0.11030257",
       "price": "781560957.000000000"
     }
   ]
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```




**Private API**


**Generate Signature**
---
```
$secret_key    = 'Secret Key';
$random_string = bin2hex(openssl_random_pseudo_bytes(16));
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
```


**Get Balance**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/get_balance';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": [
   {
     "coin": "btc",
     "total": 0.02,
     "in_order": 0,
     "pending_withdraw": 0
   },
   {
     "coin": "eth",
     "total": 0.01,
     "in_order": 0,
     "pending_withdraw": 0
   },
   {
     "coin": "irt",
     "total": 5000000,
     "in_order": 0,
     "pending_withdraw": 0
   },
 ]
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Set Limit Buy Order**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |
| symbol        | string  | btcirt                   |
| price         | float   | Limit buy price (irt)    |
| volume        | float   | Limit buy volume (btc)   |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url = 'https://ariomex.com/api/v1/set_limit_buy';
$time = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol = 'btcirt';
$price = 500000000;
$volume = 0.1;
$params = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'volume'        => $volume ,
   'price'         => $price ,
);
$query = http_build_query ( $params );
$ch = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "symbol": "btcirt",
   "order_id": "api-1c2d-aa73-530f-8bb6-6b92053fb79a",
   "time": 1611670546919,
   "type": "limit",
   "side": "buy",
   "price": 500000000,
   "volume": 0.1,
   "order_status": "pending"
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Set Limit Sell Order**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |
| symbol        | string  | btcirt                   |
| price         | float   | Limit sell price (irt)   |
| volume        | float   | Limit sell volume (btc)  |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url = 'https://ariomex.com/api/v1/set_limit_sell';
$time = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol = 'btcirt';
$price = 1200000000;
$volume = 0.02;
$params = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'volume'        => $volume ,
   'price'         => $price ,
);
$query = http_build_query ( $params );
$ch = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "symbol": "btcirt",
   "order_id": "api-d857-375a-5838-b81b-9b30b394f986",
   "time": 1611671611681,
   "type": "limit",
   "side": "sell",
   "price": 1200000000,
   "volume": 0.02,
   "order_status": "pending"
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Set Market Buy Order**
---

Methode: POST
Parameters:


| Name          | Type    | Description                               |
|---------------|---------|-------------------------------------------|
| api_key       | string  | Your API Key                              |
| signature     | string  | Signature                                 |
| random_string | string  | Random String                             |
| time          | integer | Timestamp (milliseconds)                  |
| symbol        | string  | btcirt                                    |
| volume        | float   | Market buy volume in quote currency (irt) |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/set_market_buy';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol        = 'btcirt';
$volume        = 50000;
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'volume'        => $volume ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "symbol": "btcirt",
   "order_id": "api-b481-43e5-57b1-9c28-8ace60db9d0b",
   "time": 1611671924349,
   "type": "market",
   "side": "buy",
   "volume": 50000,
   "order_status": "processing"
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Set Market Sell Order**
---

Methode: POST
Parameters:

| Name          | Type    | Description                               |
|---------------|---------|-------------------------------------------|
| api_key       | string  | Your API Key                              |
| signature     | string  | Signature                                 |
| random_string | string  | Random String                             |
| time          | integer | Timestamp (milliseconds)                  |
| symbol        | string  | btcirt                                    |
| volume        | float   | Market sell volume in base currency (btc) |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/set_market_sell';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol        = 'btcirt';
$price         = 1200000000;
$volume        = 0.01;
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'volume'        => $volume ,
   'price'         => $price ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "symbol": "btcirt",
   "order_id": "api-b796-58bd-5a66-99ff-6bdb09e90260",
   "time": 1611672326980,
   "type": "market",
   "side": "sell",
   "volume": 0.01,
   "order_status": "processing"
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Set SLTP Order**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |
| symbol        | string  | btcirt                   |
| tp_price      | float   | Take profit price        |
| sl_price      | float   | Stop loss price          |
| volume        | float   | SLTP volume              |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/set_sltp';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol        = 'btcirt';
$tp_price      = 1200000000;
$sl_price      = 500000000;
$volume        = 0.01;
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'volume'        => $volume ,
   'tp_price'      => $tp_price ,
   'sl_price'      => $sl_price ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "sl_order": {
     "symbol": "btcirt",
     "order_id": "api-2fcd-31c9-529d-8fb0-22340474a22c",
     "time": 1611673387339,
     "type": "market",
     "side": "sell",
     "price_sl": 500000000,
     "volume": 0.01,
     "order_status": "pending"
   },
   "tp_order": {
     "symbol": "btcirt",
     "order_id_tp": "api-16fa-2d10-5127-a0d5-7bd7b71900f1",
     "time": 1611673387339,
     "type": "limit",
     "side": "sell",
     "price_tp": 1200000000,
     "volume": 0.01,
     "order_status": "pending"
   }
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Set SL Order**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |
| symbol        | string  | btcirt                   |
| sl_price      | float   | Stop loss price          |
| volume        | float   | SLTP volume              |


**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/set_sl';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol        = 'btcirt';
$sl_price      = 500000000;
$volume        = 0.01;
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'volume'        => $volume ,
   'sl_price'      => $sl_price ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "sl_order": {
     "symbol": "btcirt",
     "order_id": "api-3437-eb95-54af-a9be-3f8198ed94e6",
     "time": 1611673745609,
     "type": "market",
     "side": "sell",
     "price_sl": 500000000,
     "volume": 0.01,
     "order_status": "pending"
   }
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Cancel Order**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |
| order_id      | string  | Order ID                 |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/cancel_order';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$order_id        = 'api-3437-eb95-54af-a9be-3f8198ed94e6';
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'order_id'        => $order_id ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": "canceled"
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```


**Get Order Information**
---

Methode: POST
Parameters:


| Name          | Type    | Description              |
|---------------|---------|--------------------------|
| api_key       | string  | Your API Key             |
| signature     | string  | Signature                |
| random_string | string  | Random String            |
| time          | integer | Timestamp (milliseconds) |
| symbol        | string  | btcirt                   |
| order_id      | string  | Order ID                 |



**Example:**


```
$api_key       = 'API Key';
$secret_key    = 'API Secret';
$url           = 'https://ariomex.com/api/v1/get_order_info';
$time          = round ( microtime ( true ) * 1000 );
$random_string = bin2hex ( openssl_random_pseudo_bytes ( 16 ) );
$signature     = hash_hmac ( 'sha256' , $random_string , $secret_key );
$symbol        = 'btcirt';
$order_id      = '4eea827c-33a0-55ff-92ab-1b90242ed7a6';
$params        = array (
   'api_key'       => $api_key ,
   'signature'     => $signature ,
   'random_string' => $random_string ,
   'time'          => $time ,
   'symbol'        => $symbol ,
   'order_id'      => $order_id ,
);
$query         = http_build_query ( $params );
$ch            = curl_init ();
curl_setopt ( $ch , CURLOPT_URL , $url );
curl_setopt ( $ch , CURLOPT_POST , 1 );
curl_setopt ( $ch , CURLOPT_POSTFIELDS , $query );
curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , true );
$result = curl_exec ( $ch );
curl_close ( $ch );
echo $result;
```


Result:


```
{
 "status": true,
 "message": {
   "symbol": "btcirt",
   "order_id": "4eea827c-33a0-55ff-92ab-1b90242ed7a6",
   "time": "1611674632034",
   "type": "market",
   "is_tp": false,
   "is_sl": false,
   "filled": "100.000%",
   "side": "buy",
   "price": 767655394,
   "volume": 0.00065133,
   "total": 500000,
   "order_status": "completed",
   "fills": [
     {
       "price": 767655394,
       "amount": 0.00065133,
       "fee": 0,
       "fee_coin": "btc",
       "time": "1611674632223"
     }
   ]
 }
}
```


Error:


```
{
 "status": false,
 "message": "wrong api key"
}
```

