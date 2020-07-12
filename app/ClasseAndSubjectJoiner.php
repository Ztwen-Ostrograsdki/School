<?php

namespace App;

use App\Models\Classe;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class ClasseAndSubjectJoiner extends Model
{

	protected $serie;

	protected $classe;


    public function __construct(Model $classe)
    {
    	$this->classe = $classe;
    	$identify = $classe->name;

    	if (preg_match_all('/Sixi|Cinqui/', $identify)) {
    		$this->serie = 'serie-65';
    	}
    	elseif (preg_match_all('/Quatr|Trois/', $identify)) {
    		$this->serie = 'serie-43';
    	}
    	elseif (preg_match_all('/-D/', $identify)) {
    		$this->serie = 'serie-D';
    	}
    	elseif (preg_match_all('/-A/', $identify)) {
    		$this->serie = 'serie-A';
    	}
    	elseif (preg_match_all('/-AB/', $identify)) {
    		$this->serie = 'serie-AB';
    	}
    	elseif (preg_match_all('/-G/', $identify)) {
    		$this->serie = 'serie-G';
    	}
    	elseif (preg_match_all('/-F/', $identify)) {
    		$this->serie = 'serie-F';
    	}
    	elseif (preg_match_all('/-C/', $identify)) {
    		$this->serie = 'serie-C';
    	}
    	elseif (preg_match_all('/-B/', $identify)) {
    		$this->serie = 'serie-B';
    	}
    }

    public function getSerie()
    {
        $serie = $this->serie;
        return $serie;

    }


    public function seriesSubjects($serie):?array
    {
    	$depedences = [

    		'serie-65' => ['Français', 'Anglais', 'Histoire-Géographie', 'Mathématiques', 'Physique-Chimie-Technologie', 'Biologie', 'Informatique', 'Sport'],

    		'serie-43' => ['Français', 'Anglais', 'Espagnol', 'Allemand', 'Histoire-Géographie', 'Mathématiques', 'Physique-Chimie-Technologie', 'Biologie', 'Informatique', 'Sport'],

    		'serie-A' => ['Français', 'Anglais', 'Espagnol', 'Allemand', 'Histoire-Géographie', 'Philosophie', 'Mathématiques', 'Biologie', 'Informatique', 'Sport'],

    		'serie-AB' => ['Français', 'Anglais', 'Espagnol', 'Allemand', 'Histoire-Géographie', 'Philosophie', 'Mathématiques', 'Biologie', 'Informatique', 'Sport'],

    		'serie-B' => ['Français', 'Anglais', 'Histoire-Géographie', 'Philosophie', 'Mathématiques', 'Economie', 'Biologie', 'Informatique', 'Sport'],

    		'serie-G' => ['Français', 'Anglais', 'Histoire-Géographie', 'Philosophie', 'Mathématiques', 'Comptabilité', 'Biologie', 'Informatique', 'Sport'],

    		'serie-C' => ['Français', 'Anglais', 'Histoire-Géographie', 'Philosophie', 'Physique-Chimie-Technologie', 'Mathématiques', 'Biologie', 'Informatique', 'Sport'],

    		'serie-D' => ['Français', 'Anglais', 'Histoire-Géographie', 'Philosophie', 'Physique-Chimie-Technologie', 'Mathématiques', 'Biologie', 'Informatique', 'Sport']

    	];
    	return $depedences[$serie];
    }


    public function joinedSubjectsNow(Classe $classe)
    {
    	$subjectsOnDatabase = [];
    	$subjectsCollections = Subject::whereLevel('secondary')->get();

    	foreach ($subjectsCollections as $subjectsCollection) {
    		$subjectsOnDatabase[$subjectsCollection->id] = $subjectsCollection->name;
    	}

    	$subjectsOnDatabaseTrans = array_flip($subjectsOnDatabase); //transposed

    	$subjects = $this->seriesSubjects($this->serie);

    	foreach ($subjects as $subject) {
    		if (in_array($subject, $subjectsOnDatabase)) {
    			$classe->subjects()->attach($subjectsOnDatabaseTrans[$subject]);
    		}
    	}
    }
}
