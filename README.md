# Despensa Chef

**Despensa Chef** é um aplicativo desenvolvido em PHP que ajuda os usuários a gerenciar seus ingredientes, encontrar receitas baseadas nos ingredientes disponíveis, e reduzir o desperdício de alimentos. O sistema é colaborativo, permitindo que os usuários adicionem receitas e contribuições para o banco de dados.

## Funcionalidades

- **Gerenciamento de Ingredientes**: Adicione, atualize e remova ingredientes da sua despensa.
- **Busca de Receitas**: Encontre receitas com base nos ingredientes disponíveis.
## Estrutura do Banco de Dados

O banco de dados é composto pelas seguintes tabelas:

1. **`usuario`**: Armazena informações sobre os usuários do sistema.
2. **`ingredientes`**: Contém dados sobre os ingredientes disponíveis no sistema.
3. **`receitas`**: Guarda as receitas cadastradas.
4. **`despensa`**: Relaciona usuários aos ingredientes que possuem em suas despensas.
5. **`receita_ingrediente`**: Relaciona receitas aos ingredientes que elas utilizam.
6. **`listadecompras`**: Registra as compras realizadas pelos usuários.
