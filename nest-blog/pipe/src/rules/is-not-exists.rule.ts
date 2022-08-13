import { PrismaClient } from '@prisma/client';
import {
  registerDecorator,
  ValidationArguments,
  ValidationOptions,
} from 'class-validator';

//表字段是否唯一
export function IsNotExistsRule(
  table: string,
  validationOptions?: ValidationOptions,
) {
  return function (object: Record<string, any>, propertyName: string) {
    registerDecorator({
      name: 'IsNotExistsRule',
      target: object.constructor,
      propertyName: propertyName,
      constraints: [table],
      options: validationOptions,
      validator: {
        async validate(value: string, args: ValidationArguments) {
          const prisma = new PrismaClient();
          // console.log(table);
          const user = await prisma[table].findFirst({
            where: {
              [propertyName]: args.value,
            },
          });
          return !Boolean(user);
        },
      },
    });
  };
}
