<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        $defaultData = [
            [
                "name" => "To-Do",
                "tasks" => [
                    [
                        "title" => "Implement User Authentication and Authorization",
                        "description" => "Develop and implement a secure authentication system to ensure authorized access for users, including login, registration, and password management.",
                        "tags" => "authentication, security, user management",
                    ],
                    [
                        "title" => "Design and Build System Components",
                        "description" => "Design and implement reusable system components that adhere to the application’s design principles, ensuring consistency and scalability across the platform.",
                        "tags" => "UI, system design, components",
                    ],
                    [
                        "title" => "Create and Integrate API Endpoints",
                        "description" => "Develop and integrate RESTful API endpoints to facilitate communication between the front-end and back-end, ensuring seamless data exchange.",
                        "tags" => "API, integration, backend",
                    ],
                    [
                        "title" => "Set Up Database Schema and Models",
                        "description" => "Design and implement the database schema, ensuring proper data relationships and optimization for performance. Create the necessary models to interact with the database.",
                        "tags" => "database, models, schema",
                    ],
                ],
            ],
            [
                "name" => "Doing",
                "tasks" => [
                    [
                        "title" => "Optimize Front-End Performance",
                        "description" => "Conduct performance optimization on the front-end code, including lazy loading, minification, and efficient data rendering to improve load times and user experience.",
                        "tags" => "performance, front-end, optimization",
                    ],
                    [
                        "title" => "Refactor and Improve Codebase",
                        "description" => "Review the existing codebase for improvements, focusing on code cleanliness, maintainability, and performance optimization.",
                        "tags" => "refactoring, code quality, improvement",
                    ],
                ],
            ],
            [
                "name" => "Done",
                "tasks" => [
                    [
                        "title" => "Conduct Final Testing and Quality Assurance",
                        "description" => "Perform final testing across all features to ensure the application meets all requirements and is free of bugs. Conduct user acceptance testing and resolve any reported issues.",
                        "tags" => "testing, QA, bug fixing",
                    ],
                ],
            ],
        ];
        
        // Loop through the defaultData to insert categories and tasks
        foreach ($defaultData as $categoryData) {
            // Create a category
            $category = Category::create([
                'name' => $categoryData['name'],
            ]);

            // Loop through tasks and create them
            foreach ($categoryData['tasks'] as $taskData) {
                Task::create([
                    'title' => $taskData['title'],
                    'description' => $taskData['description'],
                    'tags' => "",//$taskData['tags'],
                    'category' => $category->slug,
                    'rank' => 1,
                ]);
            }
        }

    }
}
