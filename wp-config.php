<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'priscillabd' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/,1AL@+n]scd}inLQ]}j`U;aQD0fe6?EJWp(C39lf~^IY;aG1XuNIUofT5)[<fV^' );
define( 'SECURE_AUTH_KEY',  'Log!*_2A&cR:A9#pj_kqxMJ{e/D~vWcDIi26xrunk{HDbO{5@U=X.fze?)HMtX9j' );
define( 'LOGGED_IN_KEY',    '}b>fshC-PNj: -kPHCq$v>6567cjoWZY3hb7VWj$z+}Iurz>Aj{j:r1,HB]byK1E' );
define( 'NONCE_KEY',        'k>T]7mGvZz!byOzWmzgB/tb~F0wyH_mCT&*xh)P-1.!ym}~6$.8[h<6]p<LIbvGb' );
define( 'AUTH_SALT',        'wym`wYxo{`LMoC%sm5O#1y;*WSXXvM[KOU-}ME7x<(A`[picC2o5xV2q,`[+aNCc' );
define( 'SECURE_AUTH_SALT', 'iMf1*mW^zdrh]@1r/CVo;RlEE-(Q~BBZ^y8T&~l5=T;wL4C4NQ|`Fc]$xV}h13t]' );
define( 'LOGGED_IN_SALT',   'm^8I})]C_U}uTXWsV4AB3+I]@8+{+P<Zg &.es]>T.;8:s,^6I7Z[4~..o$90[#7' );
define( 'NONCE_SALT',       'ujcYNUMObrd_l:7jCl+#XYY}$2<#EA(@J|vQdZIt`*nmx- 1~|9cmH#}(R@37=C%' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
