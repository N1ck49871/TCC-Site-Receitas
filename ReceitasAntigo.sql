
create database TCC_Receitas;
use TCC_Receitas;

create table Categoria (
idCategoria int(2) primary key not null auto_increment,
nomeCategoria varchar(20) not null
);

create table Receita (
idReceita int(3) primary key not null auto_increment,
nomeReceita varchar(70) unique not null,
porcoes int(2) not null,
tempoReceita varchar(10) not null,
qtdCalorias float(7,2) not null,
link varchar(300) unique not null,
ingrediente_1 varchar(60),
ingrediente_2 varchar(60),
ingrediente_3 varchar(60),
ingrediente_4 varchar(60),
ingrediente_5 varchar(60),
ingrediente_6 varchar(60),
ingrediente_7 varchar(60),
ingrediente_8 varchar(60),
ingrediente_9 varchar(60),
ingrediente_10 varchar(60),
ingrediente_11 varchar(60),
ingrediente_12 varchar(60),
modoPreparo varchar(1000) not null,
idcategoriaFK int(2),
foreign key (idCategoriaFK)
references Categoria(idCategoria)
);

create table Usuario (
idUsuario int(3) primary key not null auto_increment,
nomeUsuario varchar(30) not null,
emailUsuario varchar(60) unique not null,
senhaUsuario varchar(20) not null,
idCategoriaFK int(2),
foreign key (idCategoriaFK)
references Categoria(idCategoria)
);

desc Receita;
desc Usuario;
desc Categoria;

select * from Categoria;
select * from Receita;

insert into Categoria (nomeCategoria) values ('frutos do mar'), ('massas'), ('veganas'), ('salgados'), ('doces'), ('carnes');

insert into Receita values (null, 'Macarrão à carbonara', 6, '15 min','295.50', '<iframe width="962" height="541" src="https://www.youtube.com/embed/pZdnOiH4q2Q"
title="Macarrão à carbonara — Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'bacon picado gosto', 'queijo ralado a gosto','3 ovos', 'sal', 'pimenta-do-reino a gosto', 'macarrão de sua escolha (espaguete, fusili,etc.)',
'creme de leite',null, null, null, null, null, 'Frite bem o bacon, até ficar crocante (pode-se adicionar salame picado).
Coloque o macarrão para cozinhar em água e sal. No refratário onde será servido o macarrão, bata bem os ovos com um garfo.
Tempere com sal e pimenta a gosto, e junte o queijo ralado, também a gosto.
Quando o macarrão estiver pronto, escorra e coloque (bem quente) sobre a mistura de ovos, misture bem.
O calor da massa cozinha os ovos. Coloque o bacon, ainda quente, sobre o macarrão e sirva.',2);

insert into Receita values (null, 'Estrogonofe de Carne', 8, '30 min', '303.27', '<iframe width="962" height="541" src="https://www.youtube.com/embed/uTDuchZ7XPE"
 title="Estrogonofe de carne — Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'3 colheres (sopa) de azeite', '1 kg de alcatra picada', 'sal a gosto', 'pimenta-do-reino a gosto', '1 cebola picada',
'3 tomates picados sem pele e sem sementes', '2 colheres (sopa) de ketchup', '360 g de champignon fatiado', '2 latas de creme de leite sem soro', null,
null, null, 'Em uma panela, adicione o óleo, a carne, a cebola, os tomates, o caldo de carne e deixe cozinhar por 20 minutos.
Acrescente o ketchup e o champignon e deixe cozinhar até obter um molho consistente e cremoso. Desligue o fogo e acrescente o creme de leite sem soro.
Mexa até incorporar o molho ao creme. Coloque em uma forma refratária e decore com tempero e batata palha.', 6);

insert into Receita values (null, 'Macarrão com molho branco e bacon', 6, '30 min', '159.97', '<iframe width="962" height="541" src="https://www.youtube.com/embed/eje5eCAz2Rc" 
title="Macarrão com bacon e molho branco — Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'1/2 kg de bacon', '1 colher (sopa) de manteiga', '1 colher (sopa) de cebola', 'sal a gosto', '1 colher (sopa) de farinha de trigo',
'400 ml de leite', '1 pacote de macarrão cozido', 'cheiro-verde a gosto', null, null, null, null, ' Frite o bacon e escorra o óleo.
Em uma panela, adicione a manteiga e refogue a cebola. Adicione o sal e a farinha de trigo e mexa bem. Acrescente o leite e mexa até engrossar um pouco. 
Junte o bacon e o macarrão cozido e mexa. Finalize com cheiro-verde a gosto.', 2);

insert into Receita values (null,'Filé de Salmão ao Forno', 2, '50 min', 171, '<iframe width="735" height="413" src="https://www.youtube.com/embed/hZ7ELIu-rgE" 
title="Filé de Salmão ao Forno - Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'500 g de filé de salmão', '50 g de azeitonas fatiadas sem caroço', 'Orégano', '3 colheres de sopa de Molho de soja (shoyu)',
'Sal a gosto', 'Azeite a gosto', 'Limão', '1/2 cebola fatiada', null, null, null, null, 'Lave o salmão com suco de limão.
Aqueça o azeite e adicione a cebola fatiada, deixando no fogo até que fique transparente. Reserve.
Cubra uma assadeira com papel alumínio de maneira que a sobra dê para forrar todo o peixe.
Sobre o papel alumínio na assadeira, coloque o peixe já temperado com sal, regue com azeite e shoyu.
Decore com fatias de azeitonas e um pouco de orégano. Despeje a cebola por cima.
Embrulhe com o papel alumínio, de maneira que o líquido não derrame quando começar a esquentar. Leve ao forno médio para assar por cerca de 30 minutos.
Sirva com legumes e salada verde.', 1);

insert into Receita values (null, 'Ostras Gratinadas', 2, '30 min', '49.13', '<iframe width="735" height="413" src="https://www.youtube.com/embed/yoq6h79mMFY" 
title="Receita de Ostras Gratinadas - Riviera Gourmet" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'1 dúzia de ostras médias', '1 dente de alho pequeno', '1 pitada de sal grosso', '1/2 tablete de manteiga sem sal (100g)', 'Raspas de 1 limão siciliano',
'Pimenta do reino moída', '1 colher de sopa de salsinha picada', 'Azeite de oliva', '1 colher de sopa de suco de limão', 'Farinha de rosca ', null, null,
'Inicie a receita amassando o alho com uma pitada de sal grosso. Use a lâmina da faca deitada para pressionar o alho e o sal grosso contra a tábua.
O sal grosso serve de moinho para o alho. Se tiver um pilão de pedra, melhor ainda.
Coloque a pasta de alho e sal num prato e acrescente aos poucos a manteiga em cubinhos, já na temperatura ambiente para facilitar o processo.
Amasse com um grafo e com o auxílio de uma espátula, vá misturando os demais ingredientes, que são as raspas do limão, a pimenta o reino moída, a salsinha.
O azeite e o suco do limão ajudam a manteiga a ficar mais fluida, mas não exagere senão ela ficará muito líquida.
Com a manteiga já temperada pegue 2 colheres de café e faça pequenas bolinhas sobre cada ostra.
Cubra com uma pitada generosa de farinha de rosca e leve ao forno preaquecido a 200ºC por 12 minutos, ou até a farinha de rosca ficar dourada.
Sirva num prato quente (microondas por 1 minuto). Acompanha fatias de pão italiano, ou pão preto.', 1);

insert into Receita values (null, 'Peixe Porquinho Frito', 10, '35 min', 267, '<iframe width="735" height="413" src="https://www.youtube.com/embed/14OUIGu3RFE" 
title="Como fazer Peixe Porquinho frito" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'1 kilo de peixe porquinho (limpo e sem cabeça)', 'sal a gosto', 'pimenta-do-reino em pó a gosto', '2 ovos', 'farinha de trigo',
'3 limões médios','1 colher (sopa) de açafrão', null, null, null, null, null, 'Tempere o peixe com os limões, o sal, e a pimenta do reino 
e deixe curtir por pelo menos 2 horas, para o tempero se infiltrar no peixe (costumo deixar de um dia para o outro). Bata os ovos e reserve.
Em outro recipiente coloque a farinha de trigo, e o açafrão, e misture. Passe o peixe na farinha, nos ovos, e novamente na farinha de trigo.
Frite em fogo médio/alto até que doure.', 1);

insert into Receita values (null, 'Filé de Tilápia Grelhado', 2, '15 min', 249, '<iframe width="735" height="413" src="https://www.youtube.com/embed/atvFUEpoKIs" 
title="Tilápia Grelhada | Receitas Práticas Mueller" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'500g de filé de tilápia', 'Sal a gosto', 'Pimenta do reino a gosto', '1 limão Taiti', '2 colheres de sopa de manteiga',
'1 fio de azeite de oliva', '2 ramos de alecrim', null, null, null, null, null, 'Tempere o filé com o sal, pimenta e suco de um limão taiti e deixe descansar por 30 minutos.
2) Aqueça uma frigideira com duas colheres de manteiga, um fio de azeite e os ramos de alecrim e grelhe os filés.', 1);

insert into Receita values (null, 'Camarão Empanado', 4, '30 min', 297, '<iframe width="735" height="413" src="https://www.youtube.com/embed/Ee1BF9_hO3M" 
title="Camarão frito empanado — Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'400 g de camarões limpos com o rabo', '1 colher (sopa) de limão', '1 colher (sopa) de alho picados', 'sal a gosto', 'pimenta-do-reino a gosto',
'1 xícara de farinha de trigo', '1/4 de colher (chá) de açafrão em pó', '2 colheres (sopa) de salsa', '3 colheres (sopa) de leite',
'1 ovo', '1 xícara de farinha de rosca', null, 'Tempere os camarões com o suco do limão, alho e sal. Em uma travessa misture o leite e o ovo.
Em outra travessa, junte a farinha de trigo, o açafrão, a pimenta-do-reino e a salsa.
Mergulhe os camarões na mistura de leite e em seguida passe-os na farinha temperada, frite-os em óleo bem quente. 
Passe os camarões na farinha de trigo temperada, depois na mistura de leite com ovo e por fim na farinha de rosca.
Frite em óleo em imersão.', 1);

insert into Receita values (null, 'Pudim de Chocolate', 8, '90 min', 142, '<iframe width="735" height="413" src="https://www.youtube.com/embed/Fgt1Lah-mnM" 
title="Pudim de Chocolate | Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'1 lata de leite condensado', '200 g de cacau em pó 70%', '200 ml de creme de leite', '300 ml de leite',
'4 ovos', '2 xícaras de açúcar', '1/2 xícara de água', null, null, null, null, null, 'No liquidificador, junte todos os ingredientes do pudim com cuidado.
Bata tudo muito bem. Reserve. Em uma panela, coloque o açúcar e a água. Deixe derreter até virar um caramelo.
Despeje no fundo de uma forma de pudim e deixe esfriar. Depois, coloque a massa do pudim por cima e leve a forma para uma travessa com água dentro, para cozinhar em banho-maria.
Cubra com papel-alumínio. Leve para o forno a 180°C por 1 hora. Sirva.', 5);

insert into Receita values (null, 'Sardinha assada no forno', 4, '25 min', 164.4, '<iframe width="735" height="413" src="https://www.youtube.com/embed/hudVMVKMhAI" 
title="SARDINHA NO FORNO ASSADA [SUPER SABOROSA E SAUDÁVEL]" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'500g de sardinha fresca', '1/2 pimenta de cheiro picada', '2 dentes de alho picados', 'sal a gosto', 'pimenta-do-reino a gosto','raspas de 1 limão tahiti',
'1 tomate em rodelas', '1 cebola em rodelas','1 colher de sopa de alcaparras', 'fios de azeite por cima', '1 colher de chá rasa de erva doce',
'1 colher de chá rasa de dill', 'Tempere a sardinha fresca com pimenta de cheiro, alho, raspas de limão, sal, pimenta do reino, erva doce, dill.
Arrume em uma assadeira a cebola, a alcaparra e o tomate, tempere com sal e pimenta do reino. Coloque as sardinhas por cima temperadas.
Regue com azeite. Coloque no forno a 250 graus por 20 minutos com dourador ligado.', 1);

insert into Receita values (null, 'Brigadeiro', 30, '25 min', 314.06, '<iframe width="555" height="312" src="https://www.youtube.com/embed/u4fJ5pnpzyg" 
title="Brigadeiro — Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'1 colher (sopa) de manteiga', '1 lata de leite condensado', '4 colheres (sopa) de chocolate em pó', null, null, null, null, null, null, null, null, null,
'Em uma panela funda, acrescente o leite condensado, a margarina e o achocolatado (ou 4 colheres de sopa de chocolate em pó).
Cozinhe em fogo médio e mexa até que o brigadeiro comece a desgrudar da panela.
Deixe esfriar e faça pequenas bolas com a mão passando a massa no chocolate granulado.', 5);

insert into Receita values (null, 'Bolo de Cenoura', 8, '40 min', 415, '<iframe width="736" height="414" src="https://www.youtube.com/embed/mRij59AYQP0" 
title="Bolo de cenoura — Receitas TudoGostoso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
'1/2 xícara (chá) de óleo', '3 cenouras médias raladas', '4 ovos', '2 xícaras (chá) de açúcar',
'2 e 1/2 xícaras (chá) de farinha de trigo', '1 colher (sopa) de fermento em pó', '1 colher (sopa) de manteiga',
'3 colheres (sopa) de chocolate em pó', '1 xícara (chá) de açúcar', '1 xícara (chá) de leite', null, null,
'Em um liquidificador, adicione a cenoura, os ovos e o óleo, depois misture. Acrescente o açúcar e bata novamente por 5 minutos.
Em uma tigela ou na batedeira, adicione a farinha de trigo e depois misture novamente. Acrescente o fermento e misture lentamente com uma colher.
Asse em um forno preaquecido a 180° C por aproximadamente 40 minutos. Para a cobertura, despeje em uma tigela a manteiga, o chocolate em pó,
o açúcar e o leite, depois misture. Leve a mistura ao fogo e continue misturando até obter uma consistência cremosa, depois despeje a calda por cima do bolo.',5);