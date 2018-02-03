## How to use

**Clone Repo**

	git clone https://github.com/rizalreza/laravel-api.git


**Setting Database**

	Open  _.env_ file and setting your database

	* DB_DATABASE=""
	* DB_USERNAME=""
	* DB_PASSWORD=""

**Migrate** 

	php artisan migrate



**URL**


| 		URL         | HTTP Method |               Operation                |
|:-----------------:| :---------: |:--------------------------------------:|
| /api/pegawai      |  GET 	      | Returns an array of **Pegawai**        |
| /api/pegawai/:id  |  GET        | Returns the **Pegawai** with id of :id |
| /api/pegawai      |  POST       | Adds a new **Pegawai** and return it   |
| /api/pegawai/:id  |  PUT        | Updates the **Pegawai** with id of :id |
| /api/pegawai/:id  |  DELETE     | Deletes the **Pegawai** with id of :id |



### Request REST API with _curl_ 

**HEAD Request**

	curl -i -X HEAD http://localhost:8000/api/pegawai

**Output :**

	Warning: Setting custom HTTP method to HEAD with -X/--request may not work the 
	Warning: way you want. Consider using -I/--head instead.
	HTTP/1.1 200 OK
	Host: localhost:8000
	Date: Mon, 29 Jan 2018 19:00:11 +0700
	Connection: close
	X-Powered-By: PHP/7.1.13-1+ubuntu16.04.1+deb.sury.org+1
	Cache-Control: no-cache, private
	Date: Mon, 29 Jan 2018 12:00:11 GMT
	Content-Type: application/json
	X-RateLimit-Limit: 60
	X-RateLimit-Remaining: 59


**POST**

	curl -i -X POST -H "Content-Type:application/json" http://localhost:8000/api/pegawai -d '{"name":"Rizal","address":"Tasikmalaya","no_reg":"123"}'

##### Output :

	HTTP/1.1 201 Created
	Host: localhost:8000
	Date: Mon, 29 Jan 2018 12:19:53 +0000
	Connection: close
	X-Powered-By: PHP/7.1.13-1+ubuntu16.04.1+deb.sury.org+1
	Cache-Control: no-cache, private
	Date: Mon, 29 Jan 2018 12:19:53 GMT
	Content-Type: application/json
	X-RateLimit-Limit: 60
	X-RateLimit-Remaining: 59

	{"name":"Rizal","address":"Tasikmalaya","no_reg":"123","updated_at":"2018-01-29 12:19:53","created_at":"2018-01-29 12:19:53","id":62}


**GET**

	curl http://localhost:8000/api/pegawai/62]

**Output :**

	{"data":{"id":62,"Name":"Rizal","Address":"Tasikmalaya","No Reg":123}}


**PUT**

	curl -v -H "Content-Type:application/json" -X PUT http://localhost:8000/api/pegawai/62 -d '{"name":"Rizal RM","address":"Yogyakarta","no_reg":"124"}'

**Output :**

	{"data":{"id":62,"Name":"Rizal RM","Address":"Yogyakarta","No Reg":124}}

**DELETE**

	curl -v -X DELETE http://localhost:8000/api/pegawai/62

**Output :**

	This message will appear when we get back to id 62 after deleted
	{"error":{"code":"GEN-NOT-FOUND","http_code":404,"message":"Pegawai Not Found"}}