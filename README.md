# Student Grades API

A simple RESTful API to manage students, subjects, and grades.

## Endpoints

### General
- **GET /api/test** - Check if the API is working.

### Students
- **GET /api/students** - List all students.
- **POST /api/students** - Create a new student.
- **GET /api/students/{student}** - View a specific student.
- **PUT|PATCH /api/students/{student}** - Update a specific student.
- **DELETE /api/students/{student}** - Delete a specific student.
- **GET /api/students/{student}/grades** - List all grades for a student.
- **POST /api/students/{student}/grades/{subject}** - Create a grade for a student in a subject.
- **GET /api/students/{student}/grades/{subject}** - View a specific grade for a student in a subject.
- **PATCH /api/students/{student}/grades/{subject}** - Update a grade for a student in a subject.
- **DELETE /api/students/{student}/grades/{subject}** - Delete a grade for a student in a subject.
- **GET /api/students/{student}/average** - Get the average grade of a student.

### Subjects
- **GET /api/subjects** - List all subjects.
- **POST /api/subjects** - Create a new subject.
- **GET /api/subjects/{subject}** - View a specific subject.
- **PUT|PATCH /api/subjects/{subject}** - Update a specific subject.
- **DELETE /api/subjects/{subject}** - Delete a specific subject.
- **GET /api/subjects/{subject}/grades** - List all grades for a subject.
- **POST /api/subjects/{subject}/grades/{student}** - Create a grade for a student in a subject.
- **GET /api/subjects/{subject}/grades/{student}** - View a specific grade in a subject.
- **PATCH /api/subjects/{subject}/grades/{student}** - Update a grade in a subject.
- **DELETE /api/subjects/{subject}/grades/{student}** - Delete a grade in a subject.
- **GET /api/subjects/{subject}/average** - Get the average grade of a subject.

### Grades
- **GET /api/grades/overall-average** - Get the overall average of all grades.

## Notes
- Include the header `Accept: application/json` in all requests.
- IDs for students and subjects must be valid UUIDs.
