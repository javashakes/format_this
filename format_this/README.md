# Documentation for Format This!
ExpressionEngine Plugin that exposes a few simple PHP string and number formating functions into EE templates.

**Compatible with EE v2-5**

# `{exp:format_this:string}`
| parameter | description                                                          | type   | options                                                                           | default |
|-----------|----------------------------------------------------------------------|--------|-----------------------------------------------------------------------------------|---------|
| `string`  | The input being formatted                                            | string |                                                                                   | NULL    |
| `actions` | Multiple allowed (concatenate with '&&')<br>Parsed in order of entry | string | strtoupper<br>strtolower<br>ucfirst<br>lcfirst<br>ucwords<br>stripslashes<br>trim | NULL    |

&nbsp;
# `{exp:format_this:number}`
| parameter       | description                              | type   | options | default      |
|-----------------|------------------------------------------|--------|---------|--------------|
| `number`        | The input being formatted                | float  |         | 0.0          |
| `decimals`      | Sets the number of decimal points        | int    |         | 0            |
| `dec_point`     | Sets the separator for the decimal point | string |         | '.' (period) |
| `thousands_sep` | Sets the thousands separator             | string |         | ',' (comma)  |

&nbsp;
# `{exp:format_this:strip}`
| parameter | description                                                          | type   | options | default |
|-----------|----------------------------------------------------------------------|--------|---------|---------|
| `string`  | The input being formatted                                            | string |         | NULL    |
| `find`    | Multiple allowed (concatenate with '&&')<br>Parsed in order of entry | string |         | NULL    |
| `replace` | Multiple allowed (concatenate with '&&')<br>Parsed in order of entry | string |         | NULL    |

&nbsp;
# Examples
| Usage                                                                                                                      | Results                                                      |
|----------------------------------------------------------------------------------------------------------------------------|--------------------------------------------------------------|
| {exp:format_this:string}                                                                                                   | Hello World! The quick brown fox<br>jumps over the lazy dog. |
| {exp:format_this:string<br>string="Hello World!"<br>}                                                                      | Hello World!                                                 |
| {exp:format_this:string}<br>Hello World!<br>{/exp:format_this:string}                                                      | Hello World!                                                 |
| {exp:format_this:number<br>number="1234.56"<br>}                                                                           | 1,234                                                        |
| {exp:format_this:number<br>number="1234.56"<br>decimals="2"<br>}                                                           | 1,234.56                                                     |
| {exp:format_this:number<br>number="1234.56"<br>decimals="2"<br>dec_point=","<br>thousands_sep="."<br>}                     | 1.234,56                                                     |
| {exp:format_this:number}<br>1234.56<br>{/exp:format_this:number}                                                           | 1,234                                                        |
| {exp:format_this:number<br>decimals="2"<br>}<br>1234.56<br>{/exp:format_this:number}                                       | 1,234.56                                                     |
| {exp:format_this:number<br>decimals="2"<br>dec_point=","<br>thousands_sep="."<br>}<br>1234.56<br>{/exp:format_this:number} | 1.234,56                                                     |
| {exp:format_this:strip}                                                                                                    | Hello World! The quick brown fox<br>jumps over the lazy dog. |
| {exp:format_this:strip<br>string="Hello World!"<br>find="!"<br>replace=""<br>}                                             | Hello World                                                  |
| {exp:format_this:strip<br>find=" World"<br>replace=""<br>}<br>Hello World!<br>{/exp:format_this:strip}                     | Hello!                                                       |
