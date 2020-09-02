# TemplateerPHP

## Installation

Either download the files or use composer to install.

`$ composer require reestyle/templateerphp`

## Usage

### FYI
Templates can be anywhere relative to the folder set with `setBaseDir`.
Going outside that scope is possible (there is no limitation), but then
you'd need to remember or guess the folder path down to the double dot (..). 
Templates must end with `.phtml`.

As a form of 'protection', templates are loaded inside in a lambda function. 
Thus the TemplateerPHP class' private and protected properties and methods
are _invisible_ to the template. You can only access the public methods of 
the class.  

<hr />

### 'Controller' code

Basic usage when calling templates:
<pre>
    $templateer = new TemplateerPHP();

    $data = array_merge($this->data, [
        'pageTitle' => 'Hello Page!',
        'content' => 'Hello World!',
    ]);

    $viewHelpers = [
        'UrlHelper',
        'PageContentHelper',
    ]
    foreach ($viewHelpers as $helper) {
        $templateer->addHelper($helper);
    }

    $templateer
        ->setLayout('layout/default')
        ->setBaseDir(__DIR__)
        ->assign($data);

    $html = $templateer
        ->setImplicitLayout(true)
        ->render($this->getResource(), false);
</pre>

<hr />

### Helpers
A template helper is registered by its 'lowercased' name. 
E.g. PageContentHelper would become pagecontenthelper.

A helper should contain the magic method __invoke().
In the template you can address them like:

<pre>
&lt;?=pagecontenthelper() ?>
</pre> 

You can return whatever you'd like from __invoke(). Here also
is no limitation.

<hr />

###Template code

Use shorthands in templates.

Basic template:
<pre>
   &lt;h1>&lt;?=$pageTitle?>&lt;/h1>
   
   &lt;div id="content">&lt;?=$content?>&lt;/div>
</pre>

Would produce:
<pre>
   &lt;h1>Hello Page!&lt;/h1>
   
   &lt;div id="content">Hello world!&lt;/div>
</pre>

<hr />

### Partials / inserts

Using partials (or inserts) is easy too:
<pre>
   &lt;?=$templateer->partial('[template]', ['var1' => 'val1']); ?>
</pre>

You don't need to add `.phtml`. The partial renderer assumes it.

The partial may look like this:
<pre>
   &lt;?=$var1; ?>
</pre>

To output something like this:
<pre>
   val1
</pre>

## License
The Unlicense. Free to use, alter, distribute, even make money, either personal or commercial.

See LICENSE file for specifics. Or don't... You may use it in any way you want anyway. 