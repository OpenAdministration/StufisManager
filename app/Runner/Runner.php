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
    protected string $log = '';
    protected array $diff = [];

    public function __construct(public Instance $instance){}

    public function run(): Report {
        $this->result = $this->action();
        $this->beforeSave();
        $report = $this->save();
        $this->afterSave();
        return $report;
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
            'diff' => $this->diff,
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

    protected function addDiffsAssoc(array $target_array, array $actual_array){
        $keys = array_merge(array_keys($actual_array), array_keys($target_array));
        foreach($keys as $key){
            $target = $target[$key] ?? '';
            $actual = $actual[$key] ?? '';
            $this->addDiff($key, $target, $actual);
        }
    }

    protected function addDiffList($key, array $target_array, array $actual_array)
    {
        $list = array_merge($target_array, $actual_array);
        $i = 0;
        foreach($list as $item){
            $target = in_array($item, $target_array, true) ? $item : '';
            $actual = in_array($item, $actual_array, true) ? $item : '';
            $this->addDiff($key . "." .  $i++, $target, $actual);
        }
    }

    protected function addDiff($key, $target, $actual)
    {
        if($target !== $actual){
            $this->diff[$key] = [
                'target' => $target,
                'actual' => $actual,
            ];
        }
    }
}
