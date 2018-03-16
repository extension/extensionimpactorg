set :deploy_to, "/services/impact/"
if(branch = ENV['BRANCH'])
  set :branch, branch
else
  set :branch, 'master'
end
set :vhost, 'dev.extensionimpact.org'
set :deploy_server, 'dev-impact.awsi.extension.org'
server deploy_server, :app, :web, :db, :primary => true
