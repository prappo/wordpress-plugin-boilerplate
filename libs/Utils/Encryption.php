<?php
/**
 * Encryption helper.
 *
 * Provides reversible encryption for secrets that must be stored at rest and
 * later retrieved in plaintext (for example SMTP credentials). The encryption
 * key is derived from the site's WordPress salts, so encrypted values are not
 * portable between installations.
 *
 * @package WordPressPluginBoilerplate\Libs\Utils
 * @since 1.0.0
 */

namespace WordPressPluginBoilerplate\Libs\Utils;

/**
 * Class Encryption
 *
 * @since 1.0.0
 */
class Encryption {

	/**
	 * Cipher method used for encryption.
	 *
	 * @var string
	 */
	const CIPHER = 'aes-256-cbc';

	/**
	 * Derive the binary encryption key from the site's auth salt.
	 *
	 * @return string
	 */
	private static function get_key() {
		return hash( 'sha256', wp_salt( 'auth' ), true );
	}

	/**
	 * Encrypt a plaintext value.
	 *
	 * Returns a base64-encoded string containing the IV and ciphertext. If the
	 * OpenSSL extension is unavailable the original value is returned unchanged
	 * so the plugin keeps functioning.
	 *
	 * @param string $value Plaintext value to encrypt.
	 * @return string
	 */
	public static function encrypt( $value ) {
		if ( '' === (string) $value || ! function_exists( 'openssl_encrypt' ) ) {
			return (string) $value;
		}

		$iv_length  = openssl_cipher_iv_length( self::CIPHER );
		$iv         = openssl_random_pseudo_bytes( $iv_length );
		$ciphertext = openssl_encrypt( (string) $value, self::CIPHER, self::get_key(), OPENSSL_RAW_DATA, $iv );

		if ( false === $ciphertext ) {
			return (string) $value;
		}

		return base64_encode( $iv . $ciphertext );
	}

	/**
	 * Decrypt a value previously produced by {@see Encryption::encrypt()}.
	 *
	 * @param string $value Encrypted value.
	 * @return string
	 */
	public static function decrypt( $value ) {
		if ( '' === (string) $value || ! function_exists( 'openssl_decrypt' ) ) {
			return (string) $value;
		}

		$decoded = base64_decode( $value, true );

		if ( false === $decoded ) {
			return (string) $value;
		}

		$iv_length = openssl_cipher_iv_length( self::CIPHER );

		if ( strlen( $decoded ) <= $iv_length ) {
			return (string) $value;
		}

		$iv         = substr( $decoded, 0, $iv_length );
		$ciphertext = substr( $decoded, $iv_length );
		$plaintext  = openssl_decrypt( $ciphertext, self::CIPHER, self::get_key(), OPENSSL_RAW_DATA, $iv );

		return false === $plaintext ? (string) $value : $plaintext;
	}
}
