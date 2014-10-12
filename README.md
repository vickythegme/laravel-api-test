laravel-api-test
================

A Sample Test API Client for a laravel website.

There is an index.php file attached.

    $connection -> vi_post('contact',$arr);

is the connection string that needs to be used to connect to vickythegme.com

It will only save the data from the form in the index page and does nothing more.

Once you get the connection, it'll give you the json output which you can decode and check for the object value message.

    $json_output = json_decode($result); // get the result
		if($json_output -> message == 'success') {
		  //code to do whatever you need
		} else if($json_output == 'failed') {
		  //code to do what's needed when it fails
		}


		
