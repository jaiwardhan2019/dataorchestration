package com.eirtechportal.service;

import java.io.IOException;
import java.io.InputStream;

import software.amazon.awssdk.awscore.exception.AwsServiceException;
import software.amazon.awssdk.core.exception.SdkClientException;
import software.amazon.awssdk.core.sync.RequestBody;
import software.amazon.awssdk.core.waiters.WaiterResponse;
import software.amazon.awssdk.services.s3.S3Client;
import software.amazon.awssdk.services.s3.model.HeadObjectRequest;
import software.amazon.awssdk.services.s3.model.HeadObjectResponse;
import software.amazon.awssdk.services.s3.model.PutObjectRequest;
import software.amazon.awssdk.services.s3.model.S3Exception;
import software.amazon.awssdk.services.s3.waiters.S3Waiter;

/*
*  1. https://docs.aws.amazon.com/AmazonS3/latest/userguide/example_s3_Scenario_UsingLargeFiles_section.html
*  2. https://ozenero.com/amazon-s3-uploaddownload-large-files-s3-springboot-amazon-s3-multipartfile-application?ref=morioh.com&utm_source=morioh.com
*  3. https://repost.aws/knowledge-center/s3-upload-large-files  << Tuning Optimization
*  4. https://github.com/awsdocs/aws-doc-sdk-examples/tree/main/javav2/example_code/s3/src/main/java/com/example/s3
*
* */
//https://stackoverflow.com/questions/36201759/how-to-set-inputstream-content-length
public class S3Util {

    private static final String BUCKET = "xmlinbound";

    public static void uploadFile(String fileName, InputStream inputStream)
            throws S3Exception, AwsServiceException, SdkClientException, IOException {
        S3Client client = S3Client.builder().build();

        PutObjectRequest request = PutObjectRequest.builder()
                .bucket(BUCKET)
                .key(fileName)
                .acl("public-read")
                .build();

        client.putObject(request,
                RequestBody.fromInputStream(inputStream, inputStream.available()));

        S3Waiter waiter = client.waiter();
        HeadObjectRequest waitRequest = HeadObjectRequest.builder()
                .bucket(BUCKET)
                .key(fileName)
                .build();

        WaiterResponse<HeadObjectResponse> waitResponse = waiter.waitUntilObjectExists(waitRequest);

        waitResponse.matched().response().ifPresent(x -> {
            // run custom code that should be executed after the upload file exists
            // DB Code -
        });
    }
}