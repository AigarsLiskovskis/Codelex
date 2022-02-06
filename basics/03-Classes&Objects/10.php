<?php

class Application
{
    function run(VideoStore $store)
    {
        while (true) {
            echo "********** Video Store ***********" . PHP_EOL;
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!" . PHP_EOL;
                    die;
                case 1:
                    $this->addMovies($store);
                    break;
                case 2:
                    $this->rentVideo($store);
                    break;
                case 3:
                    $this->returnVideo($store);
                    break;
                case 4:
                    $this->listInventory($store);
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addMovies(object $store): void
    {
        $videoName = (string)readline("Enter video title: ");
        $store->setVideosInStore(new Video("$videoName"));
    }

    private function rentVideo(object $store): void
    {
        $select = (string)readline("Enter video title to rent: ");
        if ($store->setRentedVideos($select)) {
            echo "Rented" . PHP_EOL;
        } else {
            echo "not Available" . PHP_EOL;
        }
    }

    private function returnVideo(object $store): void
    {
        $select = (string)readline("Enter video title to return: ");
        $rate = (int)readline("Rate this video (1-5): ");
        $store->setReturnedVideo($select, $rate);
    }

    public function listInventory(object $store): void
    {
        echo "****************************" . PHP_EOL;
        $listVideos = "";
        if (!empty($store->getVideosInStore())) {
            foreach ($store->getVideosInStore() as $video) {
                if ($video->isFlag()) {
                    $flag = "Yes";
                } else {
                    $flag = "No";
                }
                $rating = "--";
                $likes = 0;
                if (!empty($video->getRating())) {
                    foreach (array_unique($video->getRating()) as $rating) {
                        if ($rating > 3) {
                            $likes += 1;
                        }
                    }
                    $liked = round($likes / count($video->getRating()) * 100, 2);
                    $rating = "Liked: " . $liked . "%";
                }
                $listVideos .= "Video:  " . $video->getTitle() . PHP_EOL
                    . "Rating: " . $rating . PHP_EOL
                    . "Rented: " . $flag . PHP_EOL . PHP_EOL;
            }
        }
        echo $listVideos;
        echo "----------------------------" . PHP_EOL;
    }

}

class VideoStore
{
    private array $videosInStore = [];

    public function setVideosInStore(Video $video): void
    {
        $this->videosInStore[] = $video;
    }

    public function setRentedVideos(string $select): string
    {
        foreach ($this->videosInStore as $video) {
            if ($select == $video->getTitle() && !$video->isFlag()) {
                $video->setFlag(true);
                return true;
            }
        }
        return false;
    }

    public function setReturnedVideo(string $select, int $rate): void
    {
        foreach ($this->videosInStore as $video) {
            if ($select == $video->getTitle()) {
                $video->setFlag(false);
                $video->setRating($rate);
            }
        }
    }

    public function getVideosInStore(): array
    {
        return $this->videosInStore;
    }
}

class Video
{
    private string $title;
    private bool $flag = false;
    private array $rating = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @param int $rating
     */
    public function setRating(int $rating): void
    {
        $this->rating[] = $rating;
    }

    /**
     * @param bool $flag
     */
    public function setFlag(bool $flag): void
    {
        $this->flag = $flag;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isFlag(): bool
    {
        return $this->flag;
    }

    /**
     * @return array
     */
    public function getRating(): array
    {
        return $this->rating;
    }
}

class VideoStoreTest
{
    public function addVideo(VideoStore $store)
    {
        $store->setVideosInStore(new Video("The Matrix"));
        $store->setVideosInStore(new Video("Godfather II"));
        $store->setVideosInStore(new Video("Star Wars Episode IV: A New Hope"));
    }

    public function addRating(VideoStore $store)
    {
        for ($i = 0; $i < count($store->getVideosInStore()); $i++) {
            foreach ($store->getVideosInStore() as $video) {
                $video->setRating(rand(0, 5));
            }
        }
    }

    public function rentReturn(VideoStore $store, Application $application)
    {
        foreach ($store->getVideosInStore() as $video) {
            $store->setRentedVideos($video->getTitle());
            if ($video->getTitle() == "Godfather II") {
                $application->listInventory($store);
            }
        }
        foreach ($store->getVideosInStore() as $video) {
            $store->setReturnedVideo($video->getTitle(), rand(0, 5));
        }
    }
}

$videoStore = new VideoStore();
$app = new Application();

$videoTest = new VideoStoreTest();
$videoTest->addVideo($videoStore);
$videoTest->addRating($videoStore);
$videoTest->rentReturn($videoStore, $app);


$app->run($videoStore);





