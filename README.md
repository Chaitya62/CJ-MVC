<p align="center">
  <a href="" rel="noopener">
 <img width=300px src="https://i.imgur.com/rZF69Zr.png" alt="CJ-MVC-logo"></a>
</p>

<h3 align="center">An attempt to make a simple MVC from scratch in PHP</h3>


## Features 

- Handle get/post easily
- Model Supports - Create, Read, Update, Delete and where clause.
- Easlly load views from controller
- Light Weight
- Doesn't contain fancy features that you don't use anyways.


## How to use

### Setup
Just clone this repository
```sh

git clone https://github.com/Chaitya62/CJ-MVC.git

```
**OR**

Download it and place it in the `htdocs` equivalent of your server.

Edit the `database.php` inside config folder to connect it to your sql database.



### How it works
The MVC follows a [CodeIgniter](https://codeigniter.com/) like url structure.

**For Example**
In the following url
http://localhost/CJ-MVC/index.php/User/get/2/

- `CJ-MVC` is the project name
- `index.php` is compulsory for now as it is the entry point to the app
- `User` is the name of the Controller 
- `get` is the function you want
- rest is passed as arguments to the function

**Note**
As the function name is `get_get` and not `get` the \_get means that want this function to handle the get requests.

### Controller

To create your own controller just copy the `Test.php` file in the controller directory and build upon it.

`require_once(__DIR__.'/../model/TestModel.php');` replace this line with your model if you have any or remove it.
also replace the constructor accordingly

### Model

To create your own model copy the `TestModel.php` file in the models directory.
For further examples on using model see the usage in `User.php`

### Views

To create your own view just create simple php views and load it using `load_view` function in the controller

```php
$this->load_view('<view name>', <associative array for variables you need in the view>)

```

That's it you are ready to roll and create the next best site.


[Here](https://chaitya62.github.io/2018/04/29/Writing-your-own-MVC-from-Scratch-in-PHP.html) is a blog post explaining this in detail.

## Sawal

An app created using this framework
[demo](https://testemailkjsce.000webhostapp.com/Forum/frontend/dist/index.html#/) [github](https://github.com/Chaitya62/Forum)

> For more details on how the framework works go through the given example files in `controller`, `model` and `view` folders. 




## Help Us

This framework is in the very early stages of it's development.

You can help me by posting issues.

or write me at [chaitya.shah@somaiya.edu](mailto://chaitya.shah@somaiya.edu)


## Contributors 

[@Chaitya62](https://github.com/Chaitya62)

[@JigarWala](https://github.com/jigarWala)





