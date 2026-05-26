<?php
/**
 * @package Devops_challenge_Junior
 * @version 1.0
 */
/*
Plugin Name: Devops challenge Júnior
Plugin URI: https://apiki.com/
Description: Sabe de nada, inocente! Ordinária!!
Author: Apiki WordPress - by Anderson
Version: 1.0
*/

// ===== CORREÇÃO 1: inicializar variável global =====
$global_lyrics = '';

function apiki_segura_o_tchan() {
	// ===== CORREÇÃO 2: declarar como global =====
	global $global_lyrics;

	$lyrics = $global_lyrics;

	// ===== CORREÇÃO 3: remover indentação de string multiline =====
	$lyrics = "Pau que nasce torto nunca se endireita
Menina que requebra a mãe pega na cabeça
Pau que nasce torto nunca se endireita
Menina que requebra a mãe pega na cabeça
Domingo ela não vai (vai, vai)
Domingo ela não vai não (vai, vai, vai)
Olha, domingo ela não vai (vai, vai)
Domingo ela não vai não (vai, vai, vai)
O pau que nasce torto nunca se endireita
Menina que requebra a mãe pega na cabeça
Pau que nasce torto nunca se endireita
Menina que requebra a mãe pega na cabeça
Segure o tchan
Amare o tchan
Segure o tchan tchan tchan tchan
Depois de nove meses você vê o resultado
Esse é o Gera Samba arrebentando no pedaço
Joga ela no meio, mete em cima, mete embaixo";

	// ===== CORREÇÃO 4: Adicionar ponto e vírgula =====
	$lyrics = explode( "\n", $lyrics );

	// ===== CORREÇÃO 5: Corrigir ordem de mt_rand =====
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// ===== CORREÇÃO 6: Substituir hook vazio por hook válido =====
add_action( 'wp_footer', 'devops_challenge' );

function devops_challenge() {
	// ===== CORREÇÃO 7: Definir $undefined_variable =====
	$undefined_variable = apiki_segura_o_tchan();
	$chosen = $undefined_variable;

	// ===== CORREÇÃO 8: Usar $lang e printf com 3 argumentos =====
	$lang   = '';
	if ( 'en_' === substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'O texto é: %s %s %s',
		__( 'Segure o Tchan, by Apiki WordPress:' ),
		$chosen,
		$lang
	);
}

function devop_css() {
	echo "
	<style type='text/css'>
	#devop {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		/* ===== CORREÇÃO 9: Corrigir line-height (1.6666 → 1.6667) ===== */
		line-height: 1.6667;
	}
	.rtl #devop {
		float: left;
	}
	.block-editor-page #devop {
		display: none;
	}
	/* ===== CORREÇÃO 10: Corrigir max-width (782px → 768px) ===== */
	@media screen and (max-width: 768px) {
		#devop,
		.rtl #devop {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'devop_css' );
?>
