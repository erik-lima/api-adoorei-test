<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productList = [
            [
                'name' => 'Galaxy S23',
                'description' => 'Para você que está a procura de um novo smartphone e dar aquele upgrade no seu dia a dia no trabalho ou para navegar nas redes sociais, precisa conhecer o Samsung Galaxy S23 na cor creme. É o smartphone top de linha pra quem quer um aparelho completo pra jogos, estudos e trabalho. Ele possui 128GB de armazenamento interno para guardar diversos aplicativos.',
                'price' => 2999
            ],
            [
                'name' => 'Xiaomi Poco X5 5G',
                'description' => 'Fotografia profissional no seu bolso. Descubra infinitas possibilidades para suas fotos com as 3 câmeras principais de sua equipe. Teste sua criatividade e jogue com iluminação, diferentes planos e efeitos para obter ótimos resultados.',
                'price' => 1346
            ],
            [
                'name' => 'Galaxy M54 5G',
                'description' => 'Apaixone-se pelo que você vê com a tela ampla FHD+ Super AMOLED de 6,7". A taxa de atualização de 120Hz do Galaxy M54 5G proporciona a você uma experiência visual suave enquanto o Brilho Extra ilumina sua visão.',
                'price' => 1576.17
            ],
            [
                'name' => 'Xiaomi Redmi Note 12S',
                'description' => 'O Redmi Note 12S é um celular intermediário da Xiaomi, focado em custo-benefício. Tendo um preço mais acessível, o aparelho conta com tela AMOLED, tem bom desempenho para o dia a dia, traz câmera de 108MP e, nesta versão, conta com incríveis 256GB de armazenamento interno.',
                'price' => 1175
            ],
            [
                'name' => 'Galaxy S23 FE 5G',
                'description' => 'O Galaxy S23 FE está aprimorado, com componentes reciclados e seguindo a elegância do design da linha Galaxy S23. Com Corning Gorilla Glass 5 protegendo a parte frontal e traseira e classificação IP68 de resistência a poeira e água, o Galaxy S23 FE é um celular feito para durar e acompanhar sua rotina.',
                'price' => 2599
            ],
            [
                'name' => 'Galaxy A54',
                'description' => 'Com acabamento de vidro premium, desing da câmera repaginado e cores energizantes, o Galaxy A54 usa uma identidade absurda em uma moldura perfeita e graciosa.',
                'price' => 1529
            ],
            [
                'name' => 'Galaxy S21 FE',
                'description' => 'Conheça o Galaxy S21 FE 5G, o estiloso smartphone da Samsung que chega para implementar a família Galaxy S21. Um aparelho que traz design atraente, desempenho poderoso, câmera de nível profissional e muita conectividade.',
                'price' => 2199
            ],
            [
                'name' => 'Redmi Note 12',
                'description' => 'O Redmi Note 12 é um intermediário com o novo processador Snapdragon 685, tela AMOLED de 120Hz, boa eficiência energética e câmeras que tiram boas fotos. Mas tem como pontos negativos o sistema de som, que é apenas mono e o excesso de apps já instalados.',
                'price' => 963
            ],
            [
                'name' => 'iPhone 13',
                'description' => 'O iPhone 13 tem uma tela superbrilhante projetada para ser resistente. Faz vídeos com qualidade de cinema.',
                'price' => 3699
            ],
            [
                'name' => 'Galaxy A34 5G',
                'description' => 'Quem não quer um smartphone que não trava, com memória boa, com câmera que tira fotos maravilhosas e uma bateria que não te deixa na mão? Se você é uma dessas pessoas, então precisa conhecer o Samsung Galaxy A34!',
                'price' => 1299
            ]
        ];

        foreach ($productList as $product) {
            Product::create($product);
        }
    }
}
