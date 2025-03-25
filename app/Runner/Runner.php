<?php

namespace App\Runner;

use App\Models\Report;
use App\Models\Instance;

abstract class Runner
{
    /**
     * @var string the name of this run, set by the child class
     */
    protected string $name;

    protected ?bool $result = null;
    protected ?string $log = null;

    public function __construct(public Instance $instance){}

    public function run(): void {
        $this->action();
        $this->beforeSave();
        $result = $this->save();
        $this->afterSave();


    }

    /**
     * The main event which will be run
     */
    abstract protected function action() : bool;

    /**
     * Is calls before the Check is saved
     */
    public function beforeSave() : void{

    }

    /**
     * Saves the result of the Run
     */
    public function save(): Report
    {
        return Report::create([
            'instance_id' => $this->instance->id,
            'name' => $this->name,
            'result' => $this->result,
            'log' => $this->log,
        ]);
    }

    /**
     * Is called
     */
    public function afterSave() : void{

    }

    public function success() : bool
    {
        return $this->result;
    }


}
