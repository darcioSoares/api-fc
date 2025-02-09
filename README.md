# API Teste Facil Consulta

## Descrição
Esta API permite gerenciar consultas, médicos, pacientes e cidades de forma eficiente e segura.
O sistema segue uma arquitetura modular, separando as responsabilidades da seguinte forma:

- **Controllers**: Responsáveis por validar os dados da requisição e chamar os serviços correspondentes.
- **Services**: Contêm a lógica de negócio, garantindo que todas as regras sejam aplicadas corretamente.
- **Repositories**: Responsáveis pela interação direta com o banco de dados, garantindo consultas eficientes e reutilizáveis.

## Arquitetura e Padrões
A API foi desenvolvida seguindo as melhores práticas:
- **Separation of Concerns**: Controllers, Services e Repositories bem definidos.
- **Validação de dados**: Feita diretamente nos controllers antes de chamar os serviços.
- **Regras de Negócio**: Encapsuladas nos services para manter o código modular e reutilizável.
- **Consultas eficientes**: Delegadas para os repositórios, garantindo desempenho otimizado.

Essa estrutura torna a API mais escalável, organizada e de fácil manutenção.

As rotas protegidas utilizam autenticação via **token Bearer**.

### Comandos laravel sails 
./vendor/bin/sail up -d
./vendor/bin/sail down
./vendor/bin/sail build --no-cache


## Endpoints

### 1. Autenticação

#### Criar uma conta
**POST** `/register`
```json
{
  "nome": "João Silva",
  "email": "joao@email.com",
  "password": "123456"
}
```

#### Fazer login
**POST** `/login`
```json
{
  "email": "joao@email.com",
  "password": "123456"
}
```

#### Fazer logout (Requer autenticação)
**POST** `/logout`

#### Obter usuário autenticado (Requer autenticação)
**GET** `/user`

---

### 2. Médicos

#### Listar todos os médicos
**GET** `/medicos`

#### Criar um médico (Requer autenticação)
**POST** `/medicos`
```json
{
  "nome": "Dr. Carlos Souza",
  "especialidade": "Cardiologia",
  "cidade_id": 1
}
```

#### Listar médicos por cidade
**GET** `/cidades/{id_cidade}/medicos`

#### Listar pacientes de um médico (Requer autenticação)
**GET** `/medicos/{id_medico}/pacientes`

---

### 3. Pacientes

#### Adicionar um paciente (Requer autenticação)
**POST** `/pacientes`
```json
{
  "nome": "Ana Maria",
  "cpf": "123.456.789-00",
  "celular": "(11) 98765-4321"
}
```

#### Atualizar dados de um paciente (Requer autenticação)
**PUT** `/pacientes/{id_paciente}`
```json
{
  "nome": "Ana Maria Souza",
  "celular": "(11) 91234-5678"
}
```

---

### 4. Consultas

#### Agendar uma consulta (Requer autenticação)
**POST** `/medicos/consulta`
```json
{
  "medico_id": 1,
  "paciente_id": 2,
  "data": "2025-03-15 14:00:00"
}
```

---

### 5. Cidades

#### Listar todas as cidades
**GET** `/cidades`

---

## Segurança e Autenticação
As rotas protegidas exigem autenticação via token Bearer. O token deve ser enviado no cabeçalho da requisição:
```
Authorization: Bearer {TOKEN}
```

---



