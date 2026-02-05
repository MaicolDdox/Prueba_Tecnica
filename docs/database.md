# Base de datos - Transportes ACME S.A.

Este documento resume la estructura y decisiones de la base de datos usada para la gestion de vehiculos, conductores y propietarios.

## Tablas y campos

### people

| Campo            | Tipo                        | Longitud | Nulo | Indice | Comentario |
|-----------------|-----------------------------|----------|------|--------|------------|
| id              | BIGINT (PK)                 | -        | No   | PK     | Autoincremental |
| document_number | VARCHAR                     | 20       | No   | UNIQUE | Numero de cedula |
| first_name      | VARCHAR                     | 60       | No   | -      | Primer nombre |
| middle_name     | VARCHAR                     | 60       | Si   | -      | Segundo nombre |
| last_name       | VARCHAR                     | 80       | No   | -      | Apellidos |
| address         | VARCHAR                     | 120      | Si   | -      | Direccion |
| phone           | VARCHAR                     | 20       | Si   | -      | Telefono |
| city            | VARCHAR                     | 60       | Si   | -      | Ciudad |
| type            | ENUM('conductor','propietario') | -   | No   | INDEX  | Tipo de persona |
| created_at      | TIMESTAMP                   | -        | No   | -      | Laravel |
| updated_at      | TIMESTAMP                   | -        | No   | -      | Laravel |

Indices:
- UNIQUE(document_number)
- INDEX(type)

### vehicles

| Campo        | Tipo                            | Longitud | Nulo | Indice | Comentario |
|-------------|---------------------------------|----------|------|--------|------------|
| id          | BIGINT (PK)                     | -        | No   | PK     | Autoincremental |
| plate       | VARCHAR                         | 20       | No   | UNIQUE | Placa del vehiculo |
| color       | VARCHAR                         | 30       | No   | -      | Color |
| brand       | VARCHAR                         | 50       | No   | -      | Marca |
| vehicle_type| ENUM('particular','publico')    | -        | No   | INDEX  | Tipo de vehiculo |
| owner_id    | BIGINT (FK -> people.id)        | -        | No   | INDEX  | Propietario |
| driver_id   | BIGINT (FK -> people.id)        | -        | No   | INDEX  | Conductor |
| created_at  | TIMESTAMP                       | -        | No   | -      | Laravel |
| updated_at  | TIMESTAMP                       | -        | No   | -      | Laravel |

Indices:
- UNIQUE(plate)
- INDEX(owner_id)
- INDEX(driver_id)
- INDEX(vehicle_type)

Llaves foraneas:
- vehicles.owner_id -> people.id
- vehicles.driver_id -> people.id

## Modelo entidad-relacion (ASCII)

```
people
  id (PK)
  document_number (UNIQUE)
  type (INDEX)
        1          N
         --------< vehicles
                  id (PK)
                  plate (UNIQUE)
                  vehicle_type (INDEX)
                  owner_id (FK -> people.id)
                  driver_id (FK -> people.id)
```

## Decisiones de diseno

- Normalizacion: conductores y propietarios comparten estructura y viven en la tabla `people`, diferenciados por `type`.
- Unicidad: `document_number` y `plate` se mantienen unicos para evitar duplicados.
- Indices: `type`, `vehicle_type`, `owner_id` y `driver_id` se indexan para acelerar filtros y joins.
- Integridad referencial: las relaciones entre `vehicles` y `people` usan llaves foraneas.
