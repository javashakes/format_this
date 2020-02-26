# format_this
ExpressionEngine Plugin that exposes a few simple PHP formating functions to EE's templates.

**Compatible with EE v2, v3, v4, and v5**


{exp:format_this:string}
------------------------------

PARAMETERS
-------------------------
string - (string $input = "") The string being formatted.
actions - (array $actions = "[actions&&listed&&below]") Multiple allowed. Executed in order of listing.
   • strtoupper
   • strtolower
   • ucfirst
   • lcfirst
   • ucwords
   • stripslashes
   • trim

EXAMPLES
-------------------------
{exp:format_this:string}
- Returns: Hello World! The quick brown fox jumps over the lazy dog.

{exp:format_this:string string="Hello World!"}
- Returns: Hello World!

{exp:format_this:string}Hello World!{/exp:format_this:string}
- Returns: Hello World!


{exp:format_this:number}
------------------------------

PARAMETERS
-------------------------
number - (float $input = 0.0) The number being formatted.
decimals - (int $decimals = 0) Sets the number of decimal points.
dec_point - (string $dec_point = ".") Sets the separator for the decimal point.
thousands_sep - (string $thousands_sep = ",") Sets the thousands separator.

EXAMPLES
-------------------------
{exp:format_this:number number="1234.56"}
- Returns: 1,234

{exp:format_this:number number="1234.56" decimals="2"}
- Returns: 1,234.56

{exp:format_this:number number="1234.56" decimals="2" dec_point="," thousands_sep="."}
- Returns: 1.234,56

{exp:format_this:number}1234.56{/exp:format_this:number}
- Returns: 1,234

{exp:format_this:number number="1234.56" decimals="2"}1234.56{/exp:format_this:number}
- Returns: 1,234.56

{exp:format_this:number number="1234.56" decimals="2" dec_point="," thousands_sep="."}1234.56{/exp:format_this:number}
- Returns: 1.234,56


{exp:format_this:strip}
------------------------------

PARAMETERS
-------------------------
string - (string $input = "") The string being formatted.
find - (array $find = "[characters&&to&&find]") Multiple allowed. Executed in order of listing.
replace - (array $replace = "[characters&&for&&replace]") Multiple allowed. Executed in order of listing.

EXAMPLES
-------------------------
{exp:format_this:strip}
- Returns: Hello World! The quick brown fox jumps over the lazy dog.

{exp:format_this:strip string="Hello World!"}
- Returns: Hello World!

{exp:format_this:strip}Hello World!{/exp:format_this:string}
- Returns: Hello World!
