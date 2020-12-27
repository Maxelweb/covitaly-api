# APIs endpoints


## zones/


This endpoint allows you to see the color status of all available zones/regions in Italy.
<aside class="info">Status could be one of the following: <code>red, orange, yellow, undefined</code></aside>

> Example request:

```bash
curl -X GET \
    -G "http://localhost/zones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/zones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/zones',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost/zones'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "last_update": "2020-12-27 17:55:43",
    "zones_status": {
        "piemonte": "yellow",
        "veneto": "yellow",
        "lombardia": "yellow",
        "emiliaromagna": "yellow",
        "umbria": "yellow",
        "lazio": "yellow",
        "toscana": "orange",
        "abruzzo": "orange",
        "molise": "yellow",
        "basilicata": "yellow",
        "puglia": "yellow",
        "marche": "yellow",
        "sicilia": "yellow",
        "sardegna": "yellow",
        "liguria": "yellow",
        "trento": "yellow",
        "bolzano": "orange",
        "friuliveneziagiulia": "yellow",
        "valledaosta": "orange",
        "campania": "orange",
        "calabria": "yellow"
    }
}
```
<div id="execution-results-GETzones" hidden>
    <blockquote>Received response<span id="execution-response-status-GETzones"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETzones"></code></pre>
</div>
<div id="execution-error-GETzones" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETzones"></code></pre>
</div>
<form id="form-GETzones" data-method="GET" data-path="zones" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETzones', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>zones</code></b>
</p>
</form>


## zones/{region}


This endpoint allows you to see to get a single region status by name.
<aside class="info">Status could be one of the following: <code>red, orange, yellow, undefined</code></aside>

> Example request:

```bash
curl -X GET \
    -G "http://localhost/zones/minus" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/zones/minus"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/zones/minus',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost/zones/minus'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (404):

```json

Not found (no region found with that name)
```
<div id="execution-results-GETzones--region-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETzones--region-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETzones--region-"></code></pre>
</div>
<div id="execution-error-GETzones--region-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETzones--region-"></code></pre>
</div>
<form id="form-GETzones--region-" data-method="GET" data-path="zones/{region}" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETzones--region-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>zones/{region}</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>region</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="region" data-endpoint="GETzones--region-" data-component="url" required  hidden>
<br>
</p>
</form>


## status/


This endpoint allows you to group the regions in Italy by the current status.
<aside class="info">Status could be one of the following: <code>red, orange, yellow, undefined</code></aside>

> Example request:

```bash
curl -X GET \
    -G "http://localhost/status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get(
    'http://localhost/status',
    [
        'headers' => [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ],
    ]
);
$body = $response->getBody();
print_r(json_decode((string) $body));
```

```python
import requests
import json

url = 'http://localhost/status'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()
```


> Example response (200):

```json
{
    "last_update": "2020-12-27 17:55:43",
    "status_zones": {
        "yellow": [
            "piemonte",
            "veneto",
            "lombardia",
            "emiliaromagna",
            "umbria",
            "lazio",
            "molise",
            "basilicata",
            "puglia",
            "marche",
            "sicilia",
            "sardegna",
            "liguria",
            "trento",
            "friuliveneziagiulia",
            "calabria"
        ],
        "orange": [
            "toscana",
            "abruzzo",
            "bolzano",
            "valledaosta",
            "campania"
        ],
        "red": [],
        "undefined": []
    }
}
```
<div id="execution-results-GETstatus" hidden>
    <blockquote>Received response<span id="execution-response-status-GETstatus"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETstatus"></code></pre>
</div>
<div id="execution-error-GETstatus" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstatus"></code></pre>
</div>
<form id="form-GETstatus" data-method="GET" data-path="status" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETstatus', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>status</code></b>
</p>
</form>



