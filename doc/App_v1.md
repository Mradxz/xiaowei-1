# APP v1 接口文档
**所有请求需要加上header信息**
	
	 accept = application/vnd.xiaowei.v1+json
	 // 其中 v1 为版本号
	
**登录成功后－header需要加入 access-token**

	access-token: ada51c22cb8f35013a6e247677b9acf599c4de01
	// 由登录接口返回 登录接口返回的是 access_token 注意一个中划线，一个是下划线

**说明：**

* 文档中接口地址省略前缀：主域名/api/app/，暂时测试地址为 http://bomeizx.com/api/app/，登录接口的全地址为：http://bomeizx.com/api/app/users/login
* 所有的返回数据结构都为

	```
	{
		result: true/false,
		message: "",			// result 为true一般无此项 为false时 存放错误信息
		error_code: 1000,		// result 为false是存放错误代码
		...,					// 其他数据 result 为false一般无此项，为true时返回数据
	}	
	```
* 备注：如无特殊说明 result = false 不在具体接口中描述
* 所有需要登录的结构 如果 error_code 返回 401 则表示需要重新登录


#### 接口名称：登录
* 接口地址: users/login
* 请求参数

    |参数|必选|类型及范围|说明|
    |---|---|---|---|
    |phone      |true|string|手机号|
    |password      |true|string|用户密码|

* 返回结果

    ```
    {
    	access_token: xxxxx 
    	// 用于访问需要登录的接口时，添加在 header（access-token） 中
    }
    ```
    
#### 接口名称：注册
* 接口地址: users/register
* 请求参数

    |参数|必选|类型及范围|说明|
    |---|---|---|---|
    |phone      |true|string|手机号|
    |password      |true|string|用户密码|

* 返回结果: 和登录接口返回结果相同


#### 接口名称：获取当前登录人信息（用于测试）
* 接口地址: users/current
* 请求参数: 无 （记得将 access-token 添加到 header 中）
* 返回结果

```
	{
		user: {} //当前登录人信息
	}
```







