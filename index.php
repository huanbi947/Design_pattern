<?php
namespace ObserverPattern
    
abstract class AbstractObserver {
    abstract function update(AbstractSubject $subject_in);
}

abstract class AbstractSubject {
    abstract function addSubscriber(AbstractObserver $observer_in);
    abstract function removeSubscriber(AbstractObserver $observer_in);
    abstract function notify();
}

function writeln($content) {
    echo $content."<br/>";
}

class BookObserver extends AbstractObserver {
    public function __construct() {
    }
    public function update(AbstractSubject $subject){
      writeln('My new book: '.$subject->getFavorites());
    }
}

class BookSubject extends AbstractSubject {
    private array $observers = [];

    function __construct() {
    }
    function addSubscriber(AbstractObserver $observer_in) {
        $this->observers[] = $observer_in;
    }
    function removeSubscriber(AbstractObserver $observer_in) {
        foreach($this->observers as $key => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$key]);
            }
        }
    }
    function notify() {
        foreach($this->observers as $obs) {
            $obs->update($this);
        }
    }
    function updateFavorites($newFavorites) {
        $this->favorites = $newFavorites;
        $this->notify();
    }
    function getFavorites() {
        return $this->favorites;
    }
}

writeln('Begin Observer Book');

$bookSubject = new BookSubject();
$bookObserver = new BookObserver();
$bookSubject->addSubscriber($bookObserver);
$bookSubject->updateFavorites('comic, horror, romantic');
$bookSubject->updateFavorites('comic, romantic, horror');
$bookSubject->removeSubscriber($bookObserver);
$bookSubject->updateFavorites('comic, romantic, horror');

writeln('End Observer Book');