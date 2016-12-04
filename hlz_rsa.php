<?php
/**
* RSA私钥解密，需在php.ini开启php_openssl.dll扩展
* @param after_encode_data 前端传来，经 RSA 加密后的数据
* @return 返回解密后的数据
*/
function RSA_Decode($after_encode_data){
    $private_key='-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQC6KzAVhTxDl/6EUTtCbtRFOPKA4/WOD9WOSP+vxIa7+wjHnNXt
WWf2JuzlTapHrx++J8K9zn75tGibXHsZb/DHvp4Pl50Ln2w1VhYuwg2MAUuf/Q2c
8dIhM8srRmPGqEn621GTK0cNGweyLR1y88epLSt6MnbQAY89vGVd/LR5TwIDAQAB
AoGAWD1WKi0flk45pc+2zdMoK7NFRhBGeFJK/4jcIBx/XCQtUielQj2pSAPFLx5z
wkxgOEoyRLLWflajalgYRMNJFSSZA9tCPmIID32OYmVm+ChCt5sTxvrugzDvA8zV
z/p97Kbz1/8BezTa4fWOfvrmPH0JrOkVcTJYpu5WlDVcf9ECQQDnVVlKccb/a8us
71FIVCZo6gBnwBf9sVeEj2WVIQdrzIYVQfVMguTiDSL0GT6FonL84XTNM8kJOYpw
G9mq9GCXAkEAzgT9Tm3aRMAG+33pCjED05za1OwwXf3xSeFNH4p9PMEsga/cew8R
pZcfC+qLj/t/yiDhf5TpHytJzQ20g9oMCQJAMYNAAEIH8KVWy6XRROTV78Cd45bm
y6LIc5PpjxipqPX2gNhEM2MUsBlVsN8yVZHmgJ+Uy1LZJYNOUR504TU68wJBAIUx
UJreBpkgFOOO+ZTvL2wmIow5zuNVhCOhl3zmyiT3NtD5Y2/jxCLsWtQXZPdHP8zs
CR20pirSj7oUPDpqRBECQQCANhG5Oo8eP0CU0Ruik7GmA6RuLbryEtCc3urf1VEp
/ebhi8ynGyC8FNxwUe+kqYwJHNvkU8WqkxhSoPsU4+WO
-----END RSA PRIVATE KEY-----';
    //这里是个范例，但是平时都是采用直接读取私钥文件的方式
    //$private_key = file_get_contents('./rsa_private_key.pem');
    openssl_private_decrypt(base64_decode($after_encode_data),$decode_result,$private_key); 
    return $decode_result;

}

var_dump(  RSA_Decode($_POST['name'])  ); 
