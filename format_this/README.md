# Format This!

ExpressionEngine Plugin that exposes a few simple PHP string and number formating functions into EE templates.

## Requirements

ExpressionEngine v2+

*Compatible with EE v2-5*

## Installation

- **EE v2:** Copy `format_this` directory into `/system/expressionengine/third_party/`
- **EE v3:** Copy `format_this` directory into `/system/user/addons/`
- **EE v4:** Copy `format_this` directory into `/system/user/addons/`
- **EE v5:** Copy `format_this` directory into `/system/user/addons/`

## Usage

### `{exp:format_this:string}`

Used for formatting string input.

#### Parameters

##### `string` *(optional)*

The input being formatted

- **Type:** string
- **Default:** `NULL`

##### `actions` *(optional)*

Multiple allowed (concatenate with '&&'), Parsed in order of entry

- **Type:** string
- **Default:** `NULL`
- **Options:** `strtoupper`, `strtolower`, `ucfirst`, `lcfirst`, `ucwords`, `stripslashes`, `trim`

#### Examples

```
{exp:format_this:string}

OUTPUT:
Hello World! The quick brown fox jumps over the lazy dog.
```

```
{exp:format_this:string string="Hello World!"}

OUTPUT:
Hello World!
```

```
{exp:format_this:string}
    Hello World!
{/exp:format_this:string}

OUTPUT:
Hello World!
```

```
{exp:format_this:string actions="strtolower"}
    Hello World!
{/exp:format_this:string}

OUTPUT:
hello world!
```

### `{exp:format_this:number}`

Used for formatting integer input.

#### Parameters

##### `number` *(optional)*

The input being formatted

- **Type:** float
- **Default:** `0.0`

##### `decimals` *(optional)*

Sets the number of decimal points

- **Type:** int
- **Default:** `0`

##### `dec_point` *(optional)*

Sets the separator for the decimal point

- **Type:** string
- **Default:** `.` (period)

##### `thousands_sep` *(optional)*

Sets the thousands separator

- **Type:** string
- **Default:** `,` (comma)

#### Examples

```
{exp:format_this:number number="1234.56"}

OUTPUT:
1,234
```

```
{exp:format_this:number number="1234.56" decimals="2"}

OUTPUT:
1,234.56
```

```
{exp:format_this:number number="1234.56" decimals="2" dec_point="," thousands_sep="."}

OUTPUT:
1.234,56
```

```
{exp:format_this:number}
    1234.56
{/exp:format_this:number}

OUTPUT:
1,234
```

```
{exp:format_this:number decimals="2"}
    1234.56
{/exp:format_this:number}

OUTPUT:
1,234.56
```

```
{exp:format_this:number decimals="2" dec_point="," thousands_sep="."}
    1234.56
{/exp:format_this:number}

OUTPUT:
1.234,56
```

### `{exp:format_this:strip}`

#### Parameters

##### `string` *(optional)*

The input being formatted

- **Type:** string
- **Default:** `NULL`

##### `find` *(optional)*

Multiple allowed (concatenate with '&&'), parsed in order of entry

- **Type:** string
- **Default:** `NULL`

##### `replace` *(optional)*

Multiple allowed (concatenate with '&&'), parsed in order of entry

- **Type:** string
- **Default:** `NULL`

#### Examples

```
{exp:format_this:strip}

OUTPUT:
Hello World! The quick brown fox jumps over the lazy dog.
```

```
{exp:format_this:strip string="Hello World!" find="!" replace=""}

OUTPUT:
Hello World
```

```
{exp:format_this:strip find=" World" replace=""}
    Hello World!
{/exp:format_this:strip}

OUTPUT:
Hello!
```

## Changelog

### 1.0.0 *(2020-03-12)*

- ExpressionEngine 3+ compatibility
- Overhauled documentation
- Version correction
- Added License
- Added Disclaimer

### 0.7.0 *(2017-03-14)*

- Documentation updates
- Authoring change

### 0.6.0 *(2013-06-25)*

- Added `{exp:format_this:strip}` tag
- Updated documentation with `{exp:format_this:strip}` tag usage

### 0.5.0 *(2013-06-14)*

- Initial release

## License

Copyright © Matthew Kirkpatrick and individual contributors. All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

1. Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
2. Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
3. Neither the name of the author nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

## Disclaimer

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS “AS IS” AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
