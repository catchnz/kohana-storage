<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Storage Library Configuration
 * 
 * @package		Storage
 * @category	Base
 * @author		Micheal Morgan <micheal@morgan.ly>, Catch <@catchnz>
 * @copyright	(c) 2011 Micheal Morgan
 * @license		MIT
 */

return array(
	/**
	 * Amazon S3
	 * 
	 * @see		classes/storage/s3.php
	 * @link	https://console.aws.amazon.com/s3/
	 * @link	https://aws-portal.amazon.com/gp/aws/developer/account/index.html?action=access-key
	 */
    's3' => array(
    	'default' => array(
	        // REQUIRED - AWS Keys - Under access credentials in AWS Portal
	        'key'        => NULL,
	        'secret_key' => NULL,
	        
	        // REQUIRED - Bucket to work with - this can be created under AWS Portal
	        'bucket'     => NULL,
	        
	        // OPTIONAL - Prefix path with additional pathing - be sure to include trailing slash "/"
		    // If left empty, media will be written to root.
	        'directory'  => NULL,
	        
	        // OPTIONAL - Override default URL with CNAME. This must be configured prior to use of this 
			// library. As of current with S3, CNAME only works with public objects. Include trailing
			// slash without the protocol such as "example.com/"
	        'cname' 	 =>	NULL,
	        
	        // OPTIONAL - Create and generate URL's as public. If set to FALSE, will preauth URL's.
	        'public'	 => NULL,
	        
	        // OPTIONAL - Number of seconds file is authorized to be downloaded
	        'preauth'	 =>30
        )
    ),
    /**
	 * EMC Atmos
	 * 
	 * Requires "pear/HTTP_Request2" and "pear/Net_URL2"
	 * 
	 * Ensure pear is setup and run the following via CLI:
	 * 
	 * pear install "channel://pear.php.net/Net_URL2-0.3.1"
	 * pear install "channel://pear.php.net/http_request2-0.5.2"
	 * 
	 * The bundled SDK uses deprecated functions. It is recommended to disable these notices in 
	 * your bootstrap under error_reporting using "E_ALL & ~E_DEPRECATED"
	 * 
	 * @see		classes/storage/atmos.php
	 * @link	http://www.emc.com/storage/atmos/atmos.htm
	 * @link	http://peer1.com/
	 */
	 
    'atmos' => array(
    	'default' => array(
    		// REQUIRED - Atmos Credentials
    		'host'			=> NULL,
    		'uid'			=> NULL,
    		'subtenant_id'	=> NULL,
    		'secret'		=> NULL,
    	
    		// OPTIONAL - Additional connection settings
    		'port'			=> 433,
    	
    		// OPTIONAL - Prefix path with additional pathing - be sure to include trailing slash "/"
			// If left empty, media will be written to root.
    		'directory'		=> NULL
    	)
    ),
    
    /**
	 * Rackspace Cloud Files
	 * 
	 * @see		classes/storage/cf.php
	 * @link	https://manage.rackspacecloud.com/
	 */
	 
    'cf' => array(
    	'default' => array(
    		// REQUIRED - Rackspace Credentials
    		'username'	=> NULL,
    		'api_key'	=> NULL,
    	
    		// REQUIRED - Container to work within - can be created under Rackspace manage - see link above
    		'container'	=> NULL,
    	
    		// OPTIONAL - If the specified container does not exist, it will be created with the following
			// visibility.
    		'public'	=> FALSE,
    	
    		// OPTIONAL - Prefix path with additional pathing - be sure to include trailing slash "/"
			// If left empty, media will be written to root.
    		'directory'	=> NULL
    	)
    ),
    
    /**
	 * FTP
	 * 
	 * @see		classes/storage/ftp.php
	 * @link	http://us.php.net/manual/en/ftp.installation.php
	 */
	 
    'ftp' => array(
    	'default' => array(
	    	// REQUIRED - FTP Credentials
	    	'host'		=> NULL,
	    	'username'	=> NULL,
	    	'password'	=> NULL,
	    	
	    	// RECOMMENDED - Public URL. When not defined, Storage_Ftp::url returns FALSE
	    	'url'		=> NULL,
	    	
	    	// OPTIONAL - Prefix path with additional pathing - be sure to include trailing slash "/"
			// If left empty, media will be written to root.
	    	'directory'	=> NULL,
	    	
	    	// OPTIONAL - Additional connection settings
	    	'port'		=> 21,
	    	'timeout'	=> 90,
	    	
			// OPTIONAL - Boolean, whether or not to make a passive connection
	    	'passive'	=> FALSE,
	    	
	    	// OPTIONAL - Boolean, whether or not to use SSL connection
	    	'ssl'		=> TRUE,
	    	// OPTIONAL - The transfer mode: `FTP_BINARY` or `FTP_ASCII`
	    	'transfer'	=> FTP_BINARY
	    )
    ),
    
    /**
	 * Local file system
	 * 
	 * @see		classes/storage/local.php
	 * @link	http://us.php.net/manual/en/book.filesystem.php
	 */
	 'local'=> array(
	 	'default' => array(
	 		// REQUIRED - Root path to work within
	 		'root_path' => NULL,
	 	
	 		// RECOMMENDED - Public URL. When not defined, Storage_Native::url returns FALSE
	 		'url'		=> NULL,
	 	
	 		// OPTIONAL - Prefix path with additional pathing - be sure to include trailing slash "/"
			// If left empty, media will be written to root.
	 		'directory'	=> NULL
	 	)
	 ),
	 
	 /**
	 * Unit Testing
	 * 
	 * @see		tests/kohana/StorageTest.php
	 */
	 'unittest' => array(
	 	// Whether or not to run storage tests.
	 	'enabled'	=> FALSE,
	 	
		// Directory path to file samples. Not required but useful for testing large files. Simply
		// specify path to a directory of sample files and each one will be tested across all enabled
		// drivers. Disable by setting FALSE. Goal is to test 2 GB files on each driver before 
		// releasing future versions.
	 	'samples'	=> FALSE
	 )
);