<?php
/**
* Plugin Name: Ingyenes szállítási küszöb - WooCommerce
* Plugin URI: https://github.com/trueqap/ingyenes-szallitasi-kuszob-woocommerce
* Description: A bővítmény segítségével kiírhatjuk a kosár oldalra, hogy mennyit kell még vásárolni az ingyenes szállításig.
* Version: 1.0
* Author: Trueqap
* Author URI: https://github.com/trueqap/
* License: GPLv2 or later
*/

add_action( 'woocommerce_checkout_before_order_review', 'mennyi_van_hatra', 15);

function mennyi_van_hatra() {

global $woocommerce;

$ingyen_szallitasi_limit = 20000; // Legyen kerek egész szám pénznem jelzés nélkül! Például: 18340

$kosar_total = $woocommerce->cart->cart_contents_total+$woocommerce->cart->tax_total;
$jelenleg = number_format($kosar_total, 0, '.', '.');

$mennyit_vasaroljak = $ingyen_szallitasi_limit - $kosar_total;
$mennyit_vasaroljak = number_format($mennyit_vasaroljak, 0, '.', '.');

if($kosar_total<$ingyen_szallitasi_limit){

echo '<div style="width:100%;  font-size:120%; padding:10px; border: 2px solid #ee3b33">Jelenleg <strong>'.$jelenleg.' Ft</strong> összegű termék van a kosaradban. Vásárolj további <strong>'.$mennyit_vasaroljak.' Ft-ért </strong> és ingyen kiszállítjuk a rendelésedet!</div>';
}

}
