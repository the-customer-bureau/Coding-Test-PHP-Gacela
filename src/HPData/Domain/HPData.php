<?php
declare(strict_types=1);

namespace Engineered\HPData\Domain;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class HPData
{

    public function __construct(
        private HttpClientInterface $client,
        private String $endpoint,
    )
    {
        
    }

    public function getCharacters(): void
    {
        $characters = $this->makeRequest();
        $this->getCharactersHTML($characters);
    }

    public function getCharactersHTML($characters): void
    {
        if (empty($characters)) {
            return;
        }

        $counter = 1;
        $itemsPerRow = 5;
        echo "<div class='row row-cols-$itemsPerRow'>";
        foreach ($characters as $index => $character) {
            $endRow = ($counter % $itemsPerRow == 0) ? '</div><div class="row row-cols-$itemsPerRow">' : '';
            echo <<<OUTPUT
                    <div class="col">
                        <img src="$character->image" class="card-img-top" width="200"/>
                        <div class="card-body">
                        <h3 class="card-title">$character->name</h3>
                        <span>$character->house</span>
                        </div><!-- /.card-body -->
                    </div><!-- /.col -->
                $endRow
            OUTPUT;

            $counter++;
        }
    }

    public function makeRequest()
    {
        $response = $this->client->request(
            'GET',
            $this->endpoint
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            return [];
        }

        return json_decode($response->getContent());
    }
}