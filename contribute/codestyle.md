---
title: Contributing
permalink: /contribute/codestyle.html
---
<div class="article" markdown="1">

# C Coding Style
Proposal for Icecast

## Formatting
Indent with (4) spaces, no tabs.  
A Line Should Not Exceed 80 Characters.

### Brace Placement
All `if`, `while`, `for` and `do` statements should either have braces or be on a single line.
Do not put parens next to keywords. Put a space between.

{% highlight c %}
if (foo == 1) {
    /* code */
} else {
    /* code */
}
{% endhighlight %}

For complex conditions you can put spaces in the start and the end of the statement,
if it helps readability:

{% highlight c %}
if ( (a > 5) && (b < 3) || (a < 7) && (!b) && (func(test_var) << 7) == 5 ) {
    /* code */
}
{% endhighlight %}

One line form:

{% highlight c %}
if (somevalue == 1) somevalue = 2;
{% endhighlight %}

(Should be used only where it really makes sense and stays readable)

### If Then Else Formatting

Recommended way:

{% highlight c %}
if (condition) {
    /* code */
} else if (condition) {
    /* code */
} else {
    /* code */
}
{% endhighlight %}

### switch Formatting
Falling through a case statement into the next case statement shall be permitted as long as a comment is included.

{% highlight c %}
switch (something) {
    case 1:
        /* code */
    break;
    case 2:
        /* code */
    /* fall through */
    case 3:
        /* code */
    break;
    default:
        /* code */
    break;
}
{% endhighlight %}

### ?:

{% highlight c %}
(condition) ? funct1() : func2();
{% endhighlight %}

or

{% highlight c %}
(condition)
    ? long statement
    : another long statement;
{% endhighlight %}

### Functions
Functions should limit themselves to a single page of code.
Unlike conditions, functions should have the curly brace on a newline.
No whitespace between function name and brace.

{% highlight c %}
static void test(client_t *client, const char *mount)
{
    /* code */
}
{% endhighlight %}

If variable list is too long, break it as follow

{% highlight c %}
static void test(client_t	*client,
                 const char	*mount)
{
    /* code */
}
{% endhighlight %}

## Macros and inline functions
Don't change syntax via macro substitution.
Macros for small tasks are ok, longer ones should be, when possible, inline functions

{% highlight c %}
inline int max(int a, int b)
{
    return (a > b) ? a : b;
}
{% endhighlight %}

When putting expressions in macros always wrap the expression in parenthesis

{% highlight c %}
#define ADD(x,y) ((x) + (y))
{% endhighlight %}

## Comments
For comments, `//` should never be used but instead `/* comment here */`.  

If the comment is about what a special if case does, it should be on the next line:

{% highlight c %}
if (ret == 0) {
    /* nothing to do */
{% endhighlight %}

Multiline comment should have text on the first line, but not on the last:

{% highlight c %}
/* This is text on the first line
 * an here is even more cool text
 */
{% endhighlight %}

</div>