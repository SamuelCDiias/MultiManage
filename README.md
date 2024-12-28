# MultiManage

**MultiManage** é um sistema de gestão empresarial que permite que os usuários gerenciem múltiplas empresas de forma eficiente. Com o MultiManage, é possível alternar entre diferentes empresas para visualizar dados específicos de cada uma, oferecendo flexibilidade e organização para negócios de diversos tamanhos.

## Funcionalidades

- **Gerenciamento de múltiplas empresas**: Adicione e organize informações de várias empresas em um único sistema.
- **Alternância de empresas**: Navegue entre diferentes empresas para acessar dados específicos de cada uma.
- **Dashboard intuitivo**: Visualize informações importantes de cada empresa em um painel interativo.

## Tecnologias Utilizadas

- **Backend**: [Laravel 11](https://laravel.com/)
- **Frontend**: [Livewire](https://laravel-livewire.com/), Blade e [Tailwind CSS](https://tailwindcss.com/)
- **Banco de Dados**: [PostgreSQL](https://www.postgresql.org/)
- **Identificadores**: UUID para maior segurança e escalabilidade

## Como Configurar o Projeto Localmente

1. Clone este repositório:
   ```bash
   git clone https://github.com/SamuelCdiias/multimanage.git
   ```
2. Entre no diretório do projeto:
   ```bash
   cd multimanage
   ```
3. Instale as dependências do PHP:
   ```bash
   composer install
   ```
4. Instale as dependências do Node.js:
   ```bash
   npm install && npm run dev
   ```
5. Configure o arquivo `.env`:
   - Renomeie o arquivo `.env.example` para `.env`
   - Configure os detalhes do banco de dados e outras variáveis de ambiente
6. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```
7. Execute as migrações para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate
   ```
8. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

O projeto estará acessível em [http://localhost:8000](http://localhost:8000).

## Estrutura do Projeto

- **app**: Contém a lógica da aplicação (Controllers, Models, etc.)
- **resources/views**: Templates Blade para o frontend
- **routes/web.php**: Definição das rotas principais
- **public**: Arquivos públicos como imagens, CSS e JS compilado
- **database/migrations**: Arquivos de migração para o banco de dados

## Contribuição

Sinta-se à vontade para contribuir com o MultiManage! Para começar:

1. Faça um *fork* deste repositório
2. Crie uma nova branch para sua funcionalidade ou correção de bug:
   ```bash
   git checkout -b feature/nome-da-sua-feature
   ```
3. Envie suas alterações:
   ```bash
   git commit -m "Descrição das alterações"
   git push origin feature/nome-da-sua-feature
   ```
4. Abra um *pull request* no GitHub

## Autor

Desenvolvido por [Samuel Dias](https://github.com/SamuelCdiias).

- **Email**: [samuelcarvalhodias2004@gmail.com](mailto:samuelcarvalhodias2004@gmail.com)
- **LinkedIn**: [Samuel Dias](https://www.linkedin.com/in/samuel-diass/)

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).

---

Esperamos que o **MultiManage** facilite a gestão das suas empresas e torne o trabalho mais eficiente! 😊

