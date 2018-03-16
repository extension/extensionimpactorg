set :deploy_to, "/services/impact/"
set :branch, 'master'
set :vhost, 'extensionimpact.org'
set :deploy_server, 'impact.awsi.extension.org'
server deploy_server, :app, :web, :db, :primary => true
