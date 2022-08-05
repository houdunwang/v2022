import { Module } from '@nestjs/common'
import { TestService } from './test.service'

@Module({
  providers: [
    TestService,
    {
      provide: 'test',
      useValue: '测试的 test 服务',
    },
  ],
  exports: [TestService, 'test'],
})
export class TestModule {}

// TestModule.prototype._module = [
//   {
//     providers: [
//       {
//         provide: TestService,
//         useClass: TestService,
//         export: true,
//       },
//     ],
//   },
// ]
