'use strict';
var lrSnippet = require('grunt-contrib-livereload/lib/utils').livereloadSnippet;
var mountFolder = function (connect, dir) {
    return connect.static(require('path').resolve(dir));
};

module.exports = function (grunt) {
    // load all grunt tasks
    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

    grunt.initConfig({
        watch: {
            livereload: {
                files: [
                    '*.html',
                    '/images/*.{png,jpg,jpeg}'
                ],
                tasks: ['livereload']
            }
        },
        connect: {
            options: {
                port: 9000
            },
            livereload: {
                options: {
                    middleware: function (connect) {
                        return [
                            lrSnippet,
                            mountFolder(connect, './')
                        ];
                    }
                }
            },
        },
        open: {
            server: {
                url: 'http://localhost:<%= connect.options.port %>/empty.html'
            }
        }
    });

    grunt.renameTask('regarde', 'watch');
    // remove when mincss task is renamed

    grunt.registerTask('server', function (target) {

        grunt.task.run([
            'livereload-start',
            'connect:livereload',
            'open',
            'watch'
        ]);
    });
};
