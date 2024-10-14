pipeline {

    agent any
    
    environment {
        PASS = credentials('registry-pass') 
    }

    stages {

        stage('Build') {
            steps {
                sh '''
                    ./jenkins-pipeline/jenkins/build/build.sh

                '''
            }
}

    stage('Test') {
            steps {
                sh './jenkins-pipeline/jenkins/test/phpunit_test.sh'
            }
          
        }
        /*
    stage('Push') {
            steps {
                sh './jenkins-pipeline/jenkins/push/push.sh'
            }
        }

        stage('Deploy') {
            steps {

                 sh './jenkins-pipeline/jenkins/deploy/deploy.sh'
            }
        }
        */
}
}
