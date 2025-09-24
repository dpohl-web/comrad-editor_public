Permalinks has to be postname

IMPORTANT: Do not forget to flush and regenerate the rewrite rules database after modifying rules. From WordPress Administration Screens, Select Settings -> Permalinks and just click Save Changes without any changes. 

this plugin needs php pear xml serializer.
Please install it in the console:
 "pear install XML_Serializer"


in wp-content/plugins/questform/php/questformbackend/index.php set 
define('DEVELOPER_MODE', true); // Only for developing
define('DATA_FROM_ANGULAR', true); // Only for developing and use angular for send data
to false!

Don`t forget to backup the remote xml files.