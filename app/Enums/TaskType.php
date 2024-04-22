<?php

namespace App\Enums;

enum TaskType: string
{
    case Color = 'color';
    case Regenerate = 'regenerate';
    case Enhance = 'enhance';
    case Sketch = 'sketch';
}