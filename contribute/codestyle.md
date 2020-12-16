---
title: Contributing
permalink: /contribute/codestyle.html
---
{::options auto_ids="true" /}
<div class="article" markdown="1">

# C Coding Style
{:.no_toc}
Proposal for Icecast

## Contents
{:.no_toc}

*   Kramdown will put table of contents here!
{:toc}

## Formatting
Indent with (4) spaces, no tabs.  
A Line Should Not Exceed 80 Characters.

### Brace Placement
All `if`, `while`, `for` and `do` statements should either have braces or be on a single line.
Do not put braces next to keywords. Put a space between.

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

## Variables

### Placement and formating
Variable declarations should always go to the begin of the current scope.
Each block of declarations is terminated by a single blank line.
Variables are never declared mixed with code.

{% highlight c %}
static void test(void)
{
    char *str;
    int i;

    /* code */

    if (expr) {
        const char *msg = getmsg();

        printf("Message: %s\n", msg);
    }
}
{% endhighlight %}

### Types
Types should be chosen by there definition. Generic or native types should be avoided
as they are often defined in a way that can result in portability problems.

Common errors include assumptions about the size or data structure of types.
Examples include the use of `short` when a 16 bit integer type is required.
The correct type here is `int16_t` from `<stdint.h>`.

Good types include:

|Type                   |Usage                                                                                                              |
|-----------------------|-------------------------------------------------------------------------------------------------------------------|
|`intN_t`               |signed integer type of fixed size (N bits)                                                                         |
|`uintN_t`              |unsigned integer type of fixed size (N bits)                                                                       |
|`size_t`               |Unsigned type used for counting objects in memory. Such as results of sizeof(), array sizes and indices, string lengths, or as counter loops iterating over arrays. |
|`ssize_t`              |Similar to `size_t` but can in addition hold the value `-1` (often used to indicate an error).                     |
|`char *`               |Strings, 0-terminated                                                                                              |
|`void *`               |Blocks of memory, not 0-terminated. Often accompanied by length parameters which should have a type of `size_t`.   |

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

## TAGs for Comments

The following tags should be used in comments, when necessary, for easier finding stuff that needs to be reviewed or handled in future release.

### Actions

-   REVIEW: Ask for a review of this.
-   REWRITE: Ask for a rewrite of this section.
-   TODO: Ask for implementation of a feature.
-   FIXME: Ask correcting an implementation.
-   REMOVE: Remove a block or feature.
-   DOCUMENT: Documentation for this block or feature is missing, incomplete or wrong and needs update.

### Conditions

-   [BEFORE\|AFTER\|IN] RELEASE $version: This is relevant to release $version. $version can also be NEXT.
-   [BEFORE\|AFTER\|IN] YEAR $yyyy: This is relevant to (4-digit) year $yyyy

### Extra Tags

-   IMPORTANT: This is an important problem.
-   SECURITY: This is security critical.
-   LEAK: This leaks some resource (memory, file descriptors, …)

### Syntax

{% highlight c %}
/* [CONDITION[ CONDITION[...]]] [EXTRA TAGS] ACTION [#TICKET]: DESCRIPTION
 * [LONG DESCRIPTION]
 */
{% endhighlight %}

### Examples

{% highlight c %}
/* BEFORE RELEASE 2.5.3 REVIEW #1234: Should we convert A to B?
 * A is according to standard REF0. This standard was superseded by
 * standard REF1 which could be implemented with option B.
 * This may break early clients of standard REF0 not being aware of SOMETHING.
 */
{% endhighlight %}

{% highlight c %}
/* IN YEAR 2022 REWRITE: Change copyright statement as license expires. */
{% endhighlight %}

{% highlight c %}
/* LEAK FIXME #1234: Fix case object can not be added to queue. */
{% endhighlight %}

{% highlight c %}
/* BEFORE RELEASE NEXT IMPORTANT SECURITY FIXME #1234: Do not expose passwords
 * on authentication failure of backend server
 */
{% endhighlight %}

{% highlight c %}
/* AFTER RELEASE 2.5.3 REMOVE: Remove support for Icecast 1.x style SOURCE requests */
{% endhighlight %}

</div>
