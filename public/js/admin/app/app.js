
var teacherApp = angular.module('teacherApp',['ngRoute','pickadate','ngDialog','chart.js','ui.tinymce'])
        .config(function($routeProvider){
            $routeProvider
                .when('/news',
                    {
                     controller:'newsController',
                        templateUrl:'/js/admin/app/views/news.html'
                    }
                )
                .when('/news/create',
                {
                    controller:'newsCreateController',
                    templateUrl:'/js/admin/app/views/newsCreate.html'
                }
                )
                .when('/news/:itemId',
                    {
                        controller:'newsEditController',
                        templateUrl:'/js/admin/app/views/newsEdit.html'
                    }
                )
                .when('/books',
                {
                    controller:'booksController',
                    templateUrl:'/js/admin/app/views/books/books.html'
                }).when('/books/create',
                {
                    controller:'booksCreateController',
                    templateUrl:'/js/admin/app/views/books/booksCreate.html'
                }
                )
                .when('/books/:itemId',
                    {
                        controller:'booksEditController',
                        templateUrl:'/js/admin/app/views/books/booksEdit.html'
                    }
                )
                .when('/courses',
                {
                    controller:'coursesController',
                    templateUrl:'/js/admin/app/views/courses/courses.html'
                })
                .when('/courses/create',
                {
                    controller:'coursesCreateController',
                    templateUrl:'/js/admin/app/views/courses/coursesCreate.html'
                })
                .when('/courses/:itemId',
                {
                    controller:'coursesEditController',
                    templateUrl:'/js/admin/app/views/courses/coursesEdit.html'
                })
                .when('/coursesEmail/:itemId',
                {
                    controller:'coursesEmailController',
                    templateUrl:'/js/admin/app/views/courses/coursesEmail.html'
                })
                .when('/homeworks',
                {
                    controller:'homeworksController',
                    templateUrl:'/js/admin/app/views/homeworks/homeworks.html'
                })
                .when('/homeworks/create/:courseId',
                {
                    controller:'homeworksCreateController',
                    templateUrl:'/js/admin/app/views/homeworks/homeworksCreate.html'
                })
                .when('/homeworks/edit/:itemId',
                {
                    controller:'homeworksEditController',
                    templateUrl:'/js/admin/app/views/homeworks/homeworksEdit.html',
                    foodata: 'course_id'
                })
                .when('/homeworks/:courseId',
                {
                    controller:'homeworksController',
                    templateUrl:'/js/admin/app/views/homeworks/homeworks.html',
                    foodata: 'course_id'
                })
                .when('/students',
                {
                    controller:'studentsController',
                    templateUrl:'/js/admin/app/views/students/students.html'
                })
                .when('/students/:courseId',
                {
                    controller:'studentsController',
                    templateUrl:'/js/admin/app/views/students/students.html',
                    foodata: 'course_id'
                })
                .when('/students/edit/:itemId',
                {
                    controller:'studentsEditController',
                    templateUrl:'/js/admin/app/views/students/studentsEdit.html',
                    foodata: 'course_id'
                })
                .when('/students/plot/:itemId',
                {
                    controller:'studentsPlotController',
                    templateUrl:'/js/admin/app/views/students/studentsPlot.html',
                    foodata: 'course_id'
                })
                .when('/students/studentEmail/:itemId',
                {
                    controller:'studentsEmailController',
                    templateUrl:'/js/admin/app/views/students/studentsEmail.html',
                    foodata: 'course_id'
                })
                .when('/exams',
                {
                    controller:'examsController',
                    templateUrl:'/js/admin/app/views/exams/exams.html'
                })
                .when('/exams/:courseId',
                {
                    controller:'examsController',
                    templateUrl:'/js/admin/app/views/exams/exams.html',
                    foodata: 'course_id'
                })
                .when('/exams/edit/:itemId',
                {
                    controller:'examsEditController',
                    templateUrl:'/js/admin/app/views/exams/examsEdit.html',
                    foodata: 'course_id'
                })
                .when('/exams/plot/:itemId',
                {
                    controller:'examsPlotController',
                    templateUrl:'/js/admin/app/views/exams/examsPlot.html',
                    foodata: 'course_id'
                })
                .when('/exams/grades/:courseId/:examId',
                {
                    controller:'examsGradesController',
                    templateUrl:'/js/admin/app/views/exams/grades/grades.html',
                    foodata: 'grades'
                })
                .when('/photos',
                {
                    controller:'photoController',
                    templateUrl:'/js/admin/app/views/photo/photo.html'
                })
                .when('/resume',
                {
                    controller:'resumeController',
                    templateUrl:'/js/admin/app/views/resume/resume.html'
                })
                .when('/farsi',
                {
                    controller:'farsiController',
                    templateUrl:'/js/admin/app/views/farsi/farsi.html'
                })
                .when('/messages',
                {
                    controller:'contactController',
                    templateUrl:'/js/admin/app/views/contact/contact.html'
                })
                .when('/messages/:itemId',
                {
                    controller:'contactViewController',
                    templateUrl:'/js/admin/app/views/contact/view.html'
                })
                .when('/',
                {
                    controller:'MainController',
                    templateUrl:'/js/admin/app/views/main/main.html',
                    foodata: 'grades'
                })
                ;

        })
        .filter("checkBoxFn", function () {
            return function(data) {
                if (angular.isArray(data)) {
                    for (var i = 0; i < data.length; i++) {
                        data[i]['checkbox'] = false;
                    }
                }
                return data;
            }
        })

        .filter('htmlToPlaintext', function() {
            return function(text) {
                return String(text).replace(/<[^>]+>/gm, '');
            }
        })