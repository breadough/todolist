<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet"> -->
    <title>To do list</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4 class="text-center">Unfinished Task
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addTask">New Task</button>
                </h4>
                <?php foreach ($Tasks as $task) : ?>
                    <h5>
                        <form action="{{route('markDone',$task->id)}}" method="post">
                            {{csrf_field()}}
                            <?php if($task->priority === 3): ?>
                                <button class="btn btn-outline-danger btn-sm">Finish</button>
                            <?php elseif($task->priority === 2): ?>
                                <button class="btn btn-outline-warning btn-sm">Finish</button>
                            <?php else: ?>
                                <button class="btn btn-outline-success btn-sm">Finish</button>
                            <?php endif; ?>
                            <?= $task->name ?>
                            <small class="text-muted"><?= $task->description ?></small>
                        </form>
                    </h5>
                <?php endforeach; ?>
            </div>

            <div class="col-md-6">
                <h4 class="text-center">Completed Task</h4>

                <?php foreach ($TasksDone as $task) : ?>
                    <li>
                        <?= $task->name ?>
                        <small class="text-muted"><?= $task->description ?></small>
                    </li>
                <?php endforeach; ?>

            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addTask">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('saveTask')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title">Add a New Task</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputTask">Task Name</label>
                            <input type="text" class="form-control" id="inputTask" name="inputTask">
                        </div>
                        <div class="form-group">
                            <label for="inputTaskDescription">Task Description</label>
                            <input type="text" class="form-control" id="inputTaskDescription" name="inputTaskDescription" placeholder="Optional">
                        </div>
                        <div class="form-group">
                            <label for="inputTaskPriority">Task Priority</label>
                            <select name="inputTaskPriority" id="inputTaskPriority" class="form-select">
                                <option value="1" selected>Low</option>
                                <option value="2">Moderate</option>
                                <option value="3">High</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>