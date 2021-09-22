        const util = require('util');
const fs = require('fs');
const TrainingApi = require("@azure/cognitiveservices-customvision-training");
const PredictionApi = require("@azure/cognitiveservices-customvision-prediction");
const msRest = require("@azure/ms-rest-js");

const setTimeoutPromise = util.promisify(setTimeout);

const trainingKey = "a4ca827bde89499892e4e86562b6a064";
const predictionKey = "8088122c6c504c3ab63d998b056a9305";
const predictionResourceId = "/subscriptions/e749ad37-4df2-480c-8358-561a877d1d63/resourceGroups/GR-VISUAL/providers/Microsoft.CognitiveServices/accounts/VisualSer-Prediction";
const sampleDataRoot = "<path to image files>";

const endPoint = "https://<my-resource-name>.cognitiveservices.azure.com/"

const publishIterationName = "classifyModel";

const credentials = new msRest.ApiKeyCredentials({ inHeader: { "Training-key": trainingKey } });
const trainer = new TrainingApi.TrainingAPIClient(credentials, endPoint);

async () => 
    console.log("Creating project...");
    const sampleProject = await trainer.createProject("Ejemplo  ");

//creacion de etiquetas

const hemlockTag = await trainer.createTag(sampleProject.id, "Hemlock");
    const cherryTag = await trainer.createTag(sampleProject.id, "Japanese Cherry");

        const predictor_credentials = new msRest.ApiKeyCredentials({ inHeader: { "Prediction-key": predictionKey } });
              const predictor = new PredictionApi.PredictionAPIClient(predictor_credentials, endPoint);
                  const testFile = fs.readFileSync(`${sampleDataRoot}/Test/test_image.jpg`);

    const results = await predictor.classifyImage(sampleProject.id, publishIterationName, testFile);

    // Step 6. Show results
    console.log("Results:");
    results.predictions.forEach(predictedResult => {
        console.log(`\t ${predictedResult.tagName}: ${(predictedResult.probability * 100.0).toFixed(2)}%`);
    });
()

