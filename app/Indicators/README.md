# Indicators module
###### API Methods

### Create
POST `/api/v1/indicators`  
###### Body
```json
{"type": "string: number, letters, numbers_and_letters, guid"}
```
###### Response
```json
{"id": "e1e1c717-fa66-4663-ba73-eb07673de3c6"}
```

___

### Get Generated Value
GET `/api/v1/indicators/{id:string}`
###### Response
```json
{"value": "182723040"}
```

___
[Go to main page](../../README.md)
