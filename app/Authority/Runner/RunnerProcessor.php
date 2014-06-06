<?php

namespace Authority\Runner;

class RunnerProcessor extends Process
{
    public function runTasks(array $tasks)
    {
        if ($tasks) {
            foreach ($tasks as $task) {
                    echo "RUN";
            }
        }
    }

}