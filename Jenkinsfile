gitlabBuilds(builds: [
"Provision",
"Test",
"Build for Staging",
"Build for Production",
"Deploy Production"]) {

    node () {
        ansiColor('xterm') {
            checkout scm

            try {
                gitlabCommitStatus("Provision") {
                    stage('Provision') {
                        echo 'Install hostupdater'
                        sh 'vagrant plugin install vagrant-hostsupdater'

                        echo "Start vagrant"
                        sh 'vagrant up'
                    }
                }
                gitlabCommitStatus("Test") {
                    stage('Tests') {
                        //Todo tests
                    }
                }

                // Build
                if (env.gitlabSourceBranch == 'develop' && !env.gitlabMergeRequestId) {
                    stage('Build for Staging') {
                        gitlabCommitStatus("Build for Staging") {
                            sh 'vagrant ssh -c "cd ultimate-wp-theme && ./scripts/build-stg.sh"'
                            sh 'echo Build done'
                        }
                    }
                }
                if (env.gitlabSourceBranch == 'master' && !env.gitlabMergeRequestId) {
                    stage('Build For Production') {
                        gitlabCommitStatus("Build for Production") {
                            sh 'vagrant ssh -c "cd ultimate-wp-theme && ./scripts/build-prod.sh"'
                            sh 'echo Build done'
                        }
                    }
                }

                // Default
                if (env.gitlabSourceBranch == 'develop' && !env.gitlabMergeRequestId) {
                    stage('Deploy Staging') {
                        gitlabCommitStatus("Deploy Staging") {
                            sh './scripts/deploy-stg.sh default'
                            sh 'rm build-stg.tar.gz'

                        }
                    }
                }
                if (env.gitlabSourceBranch == 'master' && !env.gitlabMergeRequestId) {
                    stage('Deploy Production') {
                        gitlabCommitStatus("Deploy Production") {
                            sh './scripts/deploy-prod.sh default'
                            sh 'rm build-prod.tar.gz'
                        }
                    }
                }

            } catch(e) {
                currentBuild = 'error'
                throw e
                sh 'vagrant destroy -f'
            }
            finally {
                echo 'Cleaning up'
                sh 'vagrant destroy -f'
            }
        }
    }
}
