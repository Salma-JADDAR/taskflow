<?php
require __DIR__ . '/Autoload.php';
Autoload::register();

use App\Core\Database;
use App\Entities\{Developer, Manager, FeatureTask, BugTask, MaintenanceTask};
use App\Interfaces\{Assignable, Prioritizable, Commentable};

echo "=== TASKFLOW PART 1: ARCHITECTURE VALIDATION ===\n\n";

echo "1. Testing Singleton Database:\n";
try {
    $db1 = Database::getInstance();
    $db2 = Database::getInstance();
    
    if ($db1 === $db2) {
        echo "   PASS: Singleton works correctly (same instance)\n";
    } else {
        echo "FAIL: Singleton pattern broken (different instances)\n";
    }
} catch (Exception $e) {
    echo " FAIL: " . $e->getMessage() . "\n";
}

echo "\n2. Testing Inheritance Hierarchy:\n";
try {
    $developer = new Developer("john_dev", "john@company.com", "password123", 1);
    $manager = new Manager("jane_manager", "jane@company.com", "password123", 1);
    
    if ($developer instanceof \App\Entities\TeamMember) {
        echo " PASS: Developer extends TeamMember\n";
    }
    
    if ($manager instanceof \App\Entities\TeamMember) {
        echo " PASS: Manager extends TeamMember\n";
    }
    
    echo "   Developer can create project: " . ($developer->canCreateProject() ? 'Yes' : 'No') . " (expected: No)\n";
    echo "   Manager can create project: " . ($manager->canCreateProject() ? 'Yes' : 'No') . " (expected: Yes)\n";
    
} catch (Exception $e) {
    echo "  FAIL: " . $e->getMessage() . "\n";
}

echo "\n3. Testing Task Hierarchy:\n";
try {
    $featureTask = new FeatureTask(
        "New Login Feature",
        1,
        1,
        "medium",
        "todo",
        "Implement OAuth login system",
        null,
        12.5
    );

    $bugTask = new BugTask(
        "Fix CSS Bug",
        1,
        1,
        "high",
        "in_progress",
        "Button alignment issue",
        null,
        3.5
    );

    $maintenanceTask = new MaintenanceTask(
        "Database Cleanup",
        1,
        1,
        "medium",
        "todo",
        "Remove unused records",
        null,
        2.0
    );

    if ($featureTask instanceof \App\Entities\Task) {
        echo "  PASS: FeatureTask extends Task\n";
    }

    if ($bugTask instanceof \App\Entities\Task) {
        echo "  PASS: BugTask extends Task\n";
    }

    if ($featureTask instanceof Assignable) {
        echo "  PASS: FeatureTask implements Assignable\n";
    }

    if ($bugTask instanceof Prioritizable) {
        echo "  PASS: BugTask implements Prioritizable\n";
    }

    echo "  FeatureTask complexity: " . $featureTask->calculateComplexity() . "\n";
    echo "  BugTask complexity: " . $bugTask->calculateComplexity() . "\n";
    echo "  MaintenanceTask complexity: " . $maintenanceTask->calculateComplexity() . "\n";

} catch (Exception $e) {
    echo "   FAIL: " . $e->getMessage() . "\n";
}
