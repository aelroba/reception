// package metadata file for Meteor.js

/* eslint-env meteor */

Package.describe({
  name: 'twbs:bootstrap', // https://atmospherejs.com/twbs/bootstrap
  summary: 'The most popular front-end framework for developing responsive, mobile first projects on the web.',
  version: '4.6.2',
  'rtl-revision': '1',
  git: 'https://github.com/twbs/bootstrap.git'
})

Package.onUse(api => {
  api.versionsFrom('METEOR@1.0')
  api.use('jquery', 'client')
  api.addFiles([
    'dist/css/bootstrap.css',
    'dist/css/bootstrap-rtl.css',
    'dist/js/bootstrap.js'
  ], 'client')
})
